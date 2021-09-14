<?php

namespace App\Http\Controllers\Admin\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Appointment;
use App\Models\Transaction;
use App\Models\Branches;
use App\Models\Sector;
use App\Models\Patients;
use App\Models\Countries;
use App\Models\BodyParts;
use App\Models\User;
use App\Models\Services;
use App\Models\appointmentServices;
use App\Http\Requests\Appointment\AddRequest;
use App\Http\Requests\Appointment\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{

    //-------------- Get All Data ---------------\\

    public function index()
    {
		$items       = Appointment::orderBy('id','desc')->get();
		
        return view('admin.appointment.index', [
            'items' => $items,
            'total_rows' => Appointment::all()->count(),
        ]);
    }


    //-------------- Get Single Data ---------------\\    

    public function show(Appointment $appointment)
    {
        $appointmentServices = appointmentServices::where('appointment_id',$appointment->id)->get();
        $services = Services::where('sector_id',$appointment->sector_id)->get();
        $sector = Sector::with('bodypartspv')->find($appointment->sector_id);
        $bodyparts = $sector->bodypartspv;

        return view('admin.appointment.show',[
            'appointment' => $appointment,
            'appointmentServices'    => $appointmentServices ,
            'services'    => $services ,
            'bodyparts'    => $bodyparts ,
        ]);
    }  
    
    //-------------- Get Checkout Data ---------------\\    

    public function showCheckout(Request $request)
    {
		$appointment            = Appointment::where('id',$request->id)->first();
        $appointmentServices    = appointmentServices::where('appointment_id',$appointment->id)->get();
        $setting                = Setting::first();
        $subtotal               = 0;

        foreach ($appointmentServices as $appointmentService)
        {
            $sub        = $appointmentService->service->price;
            $subtotal   = $subtotal + $sub;
        }

        $tax            = $setting->tax*$subtotal/100;
        $total          = $subtotal + $tax;

        return view('admin.modals.appointment_checkout',[
            'appointment'            => $appointment,
            'appointmentServices'    => $appointmentServices ,
            'subtotal'               => $subtotal ,
            'tax'                    => $tax ,
            'total'                  => $total ,
        ]);
    }  
    
    //-------------- Cofirm Checkout Data ---------------\\    

    public function confirmCheckout(Request $request)
    {
		$appointment            = Appointment::where('id',$request->appointment_id)->first();
        $appointmentServices    = appointmentServices::where('appointment_id',$appointment->id)->get();
        $setting                = Setting::first();
        $subtotal               = 0;

        foreach ($appointmentServices as $appointmentService)
        {
            $sub        = $appointmentService->service->price;
            $subtotal   = $subtotal + $sub;
        }

        $tax            = $setting->tax*$subtotal/100;
        $total          = $subtotal + $tax;

        $transaction =  Transaction::create([
            'appointment_id' => $appointment->id,
            'patient_id' => $appointment->patient_id,
            'branch_id' => $appointment->branch_id,
            'payment_method' => $request->payment_method,
            'sub_total' => $subtotal,
            'tax' => $tax,
            'tax_percentage' => $setting->tax,
            'total' => $total,
        ]);

        foreach ($appointmentServices as $appointmentService)
        {
            $appointmentService->update([
                'status' => 'paid',
            ]);
        }

        $appointment->update([
            'status' => 'paid',
        ]);

        if($transaction)
        {
            return response()->json([
                'status' => 'true',
                'msg' => 'success'
            ]) ;
        }
        else
        {
            return response()->json([
                'status' => 'false',
                'msg' => 'error'
            ]) ;
        }

    } 
    
    //-------------- Get Today Data ---------------\\

    public function today()
    {
        $today          = date('Y-m-d');
		$items       = Appointment::where('appointment_date', $today)->orderBy('id','desc')->get();
		
        return view('admin.appointment.today', [
            'items' => $items,
            'total_rows' => Appointment::where('appointment_date', $today)->count(),
        ]);
    }

    //-------------- Get Done Data ---------------\\

    public function done()
    {
        $today          = date('Y-m-d');
		$items       = Appointment::where('appointment_date', '<', $today)->orderBy('id','desc')->get();
		
        return view('admin.appointment.done', [
            'items' => $items,
            'total_rows' => Appointment::where('appointment_date', '<', $today)->count(),
        ]);
    }

    //-------------- Get Cancelled Data ---------------\\

    public function cancelled()
    {
		$items       = Appointment::where('status', 'cancelled')->orderBy('id','desc')->get();
		
        return view('admin.appointment.cancelled', [
            'items' => $items,
            'total_rows' => Appointment::where('status', 'cancelled')->count(),
        ]);
    }

    
    //-------------- Create New Data Page ---------------\\

    public function create()
    {
		$patients       = Patients::select('id', 'name', 'phone')->orderBy('id','desc')->get();
		$branches       = Branches::where('disable', 0)->orderBy('id','desc')->get();

		return view('admin.appointment.create', [
            'branches' => $branches,
            'patients' => $patients,
            'patients_count' => count($patients),
            ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {
        if(isset($request->patient_id))
        {
            $patient_id = $request->patient_id;
        }
        else
        {
            $patient =  Patients::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'identifiation' => $request->identifiation,
                'dateofbirth' => $request->dateofbirth,
                'age' => $request->age,
                'gender' => $request->gender,
                'nationality' => $request->nationality,
                'relationship' => $request->relationship,
                'job' => $request->job,
                'medical_history' => $request->medical_history,
            ]);

            $patient_id = $patient->id;
        }

            $appointment =  Appointment::create([
                'branch_id' => $request->branch_id,
                'sector_id' => $request->sector_id,
                'doctor_id' => $request->doctor_id,
                'patient_id' => $patient_id,
                'appointment_number' => $request->appointment_number,
                'appointment_date' => $request->appointment_date,
            ]);
            
            if($appointment)
            {
                return response()->json([
                    'status' => 'true',
                    'msg' => 'success'
                ]) ;
            }
            else
            {
                return response()->json([
                    'status' => 'false',
                    'msg' => 'error'
                ]) ;
            }
    }


    //-------------- Cancel Data  ---------------\\

    public function cancel(Request $request)
    {
        $item     = Appointment::where('id', $request->id)->first();

        $item->status = 'cancelled';
        $item->save();
    }


    //-------------- Next Step ---------------\\

    public function next(Request $request)
    {
        if($request->step == 1)
        {
            $sectors        = Sector::where('disable', 0)->orderBy('id','desc')->get();
            $branch         = Branches::where('id', $request->branch)->first();

            return view('admin.modals.appointment_next_step', [
                'request'      => $request,
                'sectors'      => $sectors,
                'branch'       => $branch,
            ]);
        }
        elseif($request->step == 2)
        {
            $branch         = Branches::where('id', $request->branch)->first();
            $sector         = Sector::where('id', $request->sector)->first();
            $doctors        = User::where('disable', 0)->where('role', 'Doctor')->where('branch_id', $request->branch)->where('sector_id', $request->sector)->get();

            return view('admin.modals.appointment_next_step', [
                'request'      => $request,
                'sector'       => $sector,
                'branch'       => $branch,
                'doctors'      => $doctors,
            ]);
        }
        elseif($request->step == 3)
        {
            $branch         = Branches::where('id', $request->branch)->first();
            $sector         = Sector::where('id', $request->sector)->first();
            $doctor         = User::where('id', $request->doctor)->first();
            $today          = date('Y-m-d');
            $appointments   = Appointment::select('appointment_number')->where('appointment_date', $today)->where('doctor_id', $request->doctor)->where('branch_id', $request->branch)->get();

            $appointment_array[] = [];

            foreach($appointments as $appointment)
            {
                $appointment_array[] = $appointment->appointment_number;
            }


            return view('admin.modals.appointment_next_step', [
                'request'      => $request,
                'sector'       => $sector,
                'branch'       => $branch,
                'doctor'       => $doctor,
                'today'        => $today,
                'appointments'        => $appointment_array,
                'countries'   => Countries::all(),
            ]);
        }

    }


    //-------------- Prev Step ---------------\\

    public function prev(Request $request)
    {
        if($request->step == 1)
        {
            $branches         = Branches::where('disable', 0)->get();

            return view('admin.modals.appointment_prev_step', [
                'request'        => $request,
                'branches'       => $branches,
            ]);
        }
        elseif($request->step == 2)
        {
            $sectors        = Sector::where('disable', 0)->orderBy('id','desc')->get();
            $branch         = Branches::where('id', $request->branch)->first();

            return view('admin.modals.appointment_prev_step', [
                'request'      => $request,
                'sectors'      => $sectors,
                'branch'       => $branch,
            ]);
        }
        elseif($request->step == 3)
        {
            $branch         = Branches::where('id', $request->branch)->first();
            $sector         = Sector::where('id', $request->sector)->first();
            $doctors        = User::where('disable', 0)->where('role', 'Doctor')->where('branch_id', $request->branch)->where('sector_id', $request->sector)->get();

            return view('admin.modals.appointment_prev_step', [
                'request'      => $request,
                'sector'       => $sector,
                'branch'       => $branch,
                'doctors'      => $doctors,
            ]);
        }
        
    }


    //-------------- Appointment Schedule ---------------\\

    public function schedule(Request $request)
    {
        
        $appointments   = Appointment::select('appointment_number')->where('appointment_date', $request->date)->where('doctor_id', $request->doctor)->get();

        $appointment_array[] = [];

        foreach($appointments as $appointment)
        {
            $appointment_array[] = $appointment->appointment_number;
        }

        return view('admin.modals.appointment_schedule', [
            'appointments'        => $appointment_array,
        ]);
    }

    //-------------- Get Patient Info ---------------\\

    public function patientinfo(Request $request)
    {
		$patient       = Patients::where('id', $request->id)->first();
		
        return view('admin.modals.patient_info', [
            'patient'        => $patient,
            'countries'   => Countries::all(),
        ]);
    }

    
    //-------------- Get Transactions ---------------\\

    public function transactions()
    {
        $transactions       = Transaction::all();
        
        return view('admin.appointment.transactions', [
            'items'        => $transactions,
            'items_count'   => count($transactions),
        ]);
    }


    //-------------- ADD NEW NOTES ---------------\\

    public function addNotes(Request $request)
    {
		$appointment = appointment::find($request->appointment_id);
		
        $appointment->update([
            'notes' => $request->notes,
        ]);

        if($appointment)
        {
            return response()->json([
                'status' => 'true',
                'msg' => 'success'
            ]) ;
        }
        else
        {
            return response()->json([
                'status' => 'false',
                'msg' => 'error'
            ]) ;
        }        
    } 
    
    
    public function addPrescription(Request $request)
    {
		$appointment = appointment::find($request->appointment_id);
		
        $appointment->update([
            'prescription' => $request->prescription,
        ]);

        if($appointment)
        {
            return response()->json([
                'status' => 'true',
                'msg' => 'success'
            ]) ;
        }
        else
        {
            return response()->json([
                'status' => 'false',
                'msg' => 'error'
            ]) ;
        }        
    } 


    public function printPrescription(Appointment $appointment)
    {
        return view('admin.appointment.printPrescription',[
            'appointment' => $appointment,
        ]);
    }
   
}
