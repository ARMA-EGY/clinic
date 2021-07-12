<?php

namespace App\Http\Controllers\Staff\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
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

class AppointmentController extends Controller
{

    //-------------- Get All Data ---------------\\

    public function index()
    {
        $user = auth()->user();
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
    //-------------- Get Today Data ---------------\\

    public function today()
    {
        $user = auth()->user();
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
		$items       = Appointment::where('branch_id', $user->branch_id)->where('cancelled', 1)->orderBy('id','desc')->get();
		
        return view('staff.appointment.cancelled', [
            'items' => $items,
            'total_rows' => Appointment::where('branch_id', $user->branch_id)->where('cancelled', 1)->count(),
        ]);
    }

    
    //-------------- Create New Data Page ---------------\\

    public function create()
    {
        $user           = auth()->user();
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

        $item->cancel = 1;
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
   
}
