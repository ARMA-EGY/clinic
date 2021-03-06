<?php

namespace App\Http\Controllers\Staff\Appointment;

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
        $user = auth()->user();
        if(!$user->hasPermissionTo('internal all appointment'))
        {
            return redirect(route('home'));
        }
		$items       = Appointment::where('branch_id', $user->branch_id)->orderBy('id','desc')->get();
		
        return view('staff.appointment.index', [
            'items' => $items,
            'total_rows' => Appointment::where('branch_id', $user->branch_id)->count(),
        ]);
    }


    //-------------- Get Single Data ---------------\\    

    public function show(Appointment $appointment)
    {
        $user = auth()->user();
        $appointmentServices = appointmentServices::where('appointment_id',$appointment->id)->get();
        $services = Services::where('sector_id',$appointment->sector_id)->get();
        $bodyparts = BodyParts::all();

        return view('staff.appointment.show',[
            'appointment' => $appointment,
            'appointmentServices'    => $appointmentServices ,
            'services'    => $services ,
            'bodyparts'    => $bodyparts ,
        ]);
    }   
    
    //-------------- Get Checkout Data ---------------\\    

    public function showCheckout(Request $request)
    {
		$appointment            = Appointment::with('transaction')->where('id',$request->id)->first();
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

        return view('staff.modals.appointment_checkout',[
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
        $user = auth()->user();
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
        $remain         = $total - $request->paid;


		$get_transaction      = Transaction::where('appointment_id',$request->appointment_id)->first();

        if($get_transaction )
        {
            $old_paid       = $get_transaction->paid;
            $old_remain     = $get_transaction->remain;

            $paid2          = $old_paid + $request->paid;
            $remain2        = $old_remain - $request->paid;

            if($remain2 > 0)
            {
                $status = 'partial_paid';
            }
            else
            {
                $status = 'paid';
            }

            foreach ($appointmentServices as $appointmentService)
            {
                $appointmentService->update([
                    'status' => $status,
                ]);
            }

            $appointment->update([
                'status' => $status,
            ]);

            $get_transaction->update([
                'paid'              => $paid2,
                'remain'            => $remain2,
                'status'            => $status,
            ]);

            $transaction_details =  TransactionDetails::create([
                'transaction_id'    => $get_transaction->id,
                'payment_method'    => $request->payment_method,
                'amount'            => $request->paid,
            ]);
        }
        else
        {
            if($remain > 0)
            {
                $status = 'partial_paid';
            }
            else
            {
                $status = 'paid';
            }

            foreach ($appointmentServices as $appointmentService)
            {
                $appointmentService->update([
                    'status' => $status,
                ]);
            }

            $appointment->update([
                'status' => $status,
            ]);

            $transaction =  Transaction::create([
                'appointment_id'    => $appointment->id,
                'patient_id'        => $appointment->patient_id,
                'branch_id'         => $appointment->branch_id,
                'payment_method'    => $request->payment_method,
                'sub_total'         => $subtotal,
                'tax'               => $tax,
                'tax_percentage'    => $setting->tax,
                'total'             => $total,
                'paid'              => $request->paid,
                'remain'            => $remain,
                'status'            => $status,
                'user_id'           => $user->id,
            ]);

            $transaction_details =  TransactionDetails::create([
                'transaction_id'    => $transaction->id,
                'payment_method'    => $request->payment_method,
                'amount'            => $request->paid,
            ]);

        }
        

        if($transaction_details)
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
        $user = auth()->user();
        if(!$user->hasPermissionTo('internal today appointment'))
        {
            return redirect(route('home'));
        }
        $today          = date('Y-m-d');
		$items       = Appointment::where('branch_id', $user->branch_id)->where('appointment_date', $today)->orderBy('id','desc')->get();
		
        return view('staff.appointment.today', [
            'items' => $items,
            'total_rows' => Appointment::where('branch_id', $user->branch_id)->where('appointment_date', $today)->count(),
        ]);
    }

    //-------------- Get Done Data ---------------\\

    public function done()
    {
        $user = auth()->user();
        if(!$user->hasPermissionTo('internal done appointment'))
        {
            return redirect(route('home'));
        }
        $today          = date('Y-m-d');
		$items       = Appointment::where('branch_id', $user->branch_id)->where('appointment_date', '<', $today)->orderBy('id','desc')->get();
		
        return view('staff.appointment.done', [
            'items' => $items,
            'total_rows' => Appointment::where('branch_id', $user->branch_id)->where('appointment_date', '<', $today)->count(),
        ]);
    }

    //-------------- Get Cancelled Data ---------------\\

    public function cancelled()
    {
        $user = auth()->user();
        if(!$user->hasPermissionTo('internal cancelled appointment'))
        {
            return redirect(route('home'));
        }
		$items       = Appointment::where('branch_id', $user->branch_id)->where('status', 'cancelled')->orderBy('id','desc')->get();
		
        return view('staff.appointment.cancelled', [
            'items' => $items,
            'total_rows' => Appointment::where('branch_id', $user->branch_id)->where('status', 'cancelled')->count(),
        ]);
    }

    
    //-------------- Create New Data Page ---------------\\

    public function create()
    {
        $user           = auth()->user();
        if(!$user->hasPermissionTo('internal create appointment'))
        {
            return redirect(route('home'));
        }
        $branch         = Branches::where('id', $user->branch_id)->first();
        $sectors        = Sector::where('disable', 0)->orderBy('id','desc')->get();
		$patients       = Patients::select('id', 'name', 'phone')->orderBy('id','desc')->get();

        return view('staff.appointment.create', [
            'branch'         => $branch,
            'sectors'        => $sectors,
            'patients'       => $patients,
            'patients_count' => count($patients),
        ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {
        $user = auth()->user();
        if(!$user->hasPermissionTo('internal create appointment'))
        {
            return redirect(route('home'));
        }
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
                'file_no' => $request->file_no,
                'insurance_no' => $request->insurance_no,
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
                'user_id'           => $user->id,
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
            $branch         = Branches::where('id', $request->branch)->first();
            $sector         = Sector::where('id', $request->sector)->first();
            $doctors        = User::where('disable', 0)->where('role', 'Doctor')->where('branch_id', $request->branch)->where('sector_id', $request->sector)->get();

            return view('staff.modals.appointment_next_step', [
                'request'      => $request,
                'sector'       => $sector,
                'branch'       => $branch,
                'doctors'      => $doctors,
            ]);
        }
        elseif($request->step == 2)
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


            return view('staff.modals.appointment_next_step', [
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
            $sectors        = Sector::where('disable', 0)->orderBy('id','desc')->get();
            $branch         = Branches::where('id', $request->branch)->first();

            return view('staff.modals.appointment_prev_step', [
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

            return view('staff.modals.appointment_prev_step', [
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

        return view('staff.modals.appointment_schedule', [
            'appointments'        => $appointment_array,
        ]);
    }

    //-------------- Get Patient Info ---------------\\

    public function patientinfo(Request $request)
    {
		$patient       = Patients::where('id', $request->id)->first();
		
        return view('staff.modals.patient_info', [
            'patient'        => $patient,
            'countries'   => Countries::all(),
        ]);
    }

    
    //-------------- Get Transactions ---------------\\

    public function transactions()
    {
        $user               = auth()->user();
        $transactions       = Transaction::where('branch_id', $user->branch_id)->orderBy('id','desc')->get();
        
        return view('staff.appointment.transactions', [
            'items'        => $transactions,
            'items_count'   => count($transactions),
        ]);
    }
   
}
