<?php

namespace App\Http\Controllers\Doctor\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Branches;
use App\Models\Sector;
use App\Models\BodyParts;
use App\Models\Patients;
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
        $user        = Auth::user();
		$items       = Appointment::where('doctor_id',$user->id)->orderBy('id','desc')->get();
		
        return view('doctor.appointment.index', [
            'items' => $items,
            'total_rows' => count($items),
        ]);
    }


    //-------------- Get Single Data ---------------\\    

    public function show($id)
    {
        $appointment = appointment::find($id);
        $user = Auth::user();
        $appointmentServices = appointmentServices::where('appointment_id',$appointment->id)->get();
        $services = Services::where('sector_id',$appointment->sector_id)->get();
        $sector = Sector::with('bodypartspv')->find($appointment->sector_id);
        $bodyparts = $sector->bodypartspv;
        
        return view('doctor.appointment.show',[
            'appointment' => $appointment,
            'appointmentServices'    => $appointmentServices ,
            'services'    => $services ,
            'bodyparts'    => $bodyparts ,
        ]);
    }     
    //-------------- Get Today Data ---------------\\

    public function today()
    {
        $today          = date('Y-m-d');
        $user = Auth::user();
		$items       = Appointment::where('appointment_date', $today)
        ->where('doctor_id',$user->id)
        ->orderBy('id','desc')
        ->get();
		
        return view('doctor.appointment.today', [
            'items' => $items,
            'total_rows' => count($items),
        ]);
    }

    //-------------- Get Done Data ---------------\\

    public function done()
    {
        $today          = date('Y-m-d');
        $user = Auth::user();
		$items       = Appointment::where('appointment_date', '<', $today)
        ->where('doctor_id',$user->id)
        ->orderBy('id','desc')
        ->get();
		
        return view('doctor.appointment.done', [
            'items' => $items,
            'total_rows' => count($items),
        ]);
    }

    //-------------- Get Cancelled Data ---------------\\

    public function cancelled()
    {
        $user = Auth::user();
		$items       = Appointment::where('cancelled', 1)
        ->where('doctor_id',$user->id)
        ->orderBy('id','desc')
        ->get();
		
        return view('doctor.appointment.cancelled', [
            'items' => $items,
            'total_rows' => count($items),
        ]);
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
        return view('doctor.appointment.printPrescription',[
            'appointment' => $appointment,
        ]);
    }

    
    public function addReport(Request $request)
    {
		$appointment = appointment::find($request->appointment_id);
		
        $appointment->update([
            'report_hospital_visit_date' => $request->hospital_visit_date,
            'report_admission_date' => $request->admission_date,
            'report_date_discharge' => $request->date_discharge,
            'report_sick_leave_period' => $request->sick_leave_period,
            'report_diagnosis' => $request->diagnosis,
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
   

    
    public function printMedicalReport(Appointment $appointment)
    {
        return view('doctor.appointment.printMedicalReport',[
            'appointment' => $appointment,
        ]);
    }    
   
}
