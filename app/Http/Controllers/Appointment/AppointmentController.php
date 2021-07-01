<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Branches;
use App\Models\Sector;
use App\Models\Patients;
use App\Models\User;
use App\Http\Requests\Appointment\AddRequest;
use App\Http\Requests\Appointment\UpdateRequest;
use Illuminate\Support\Facades\Storage;

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
		$items       = Appointment::where('cancelled', 1)->orderBy('id','desc')->get();
		
        return view('admin.appointment.cancelled', [
            'items' => $items,
            'total_rows' => Appointment::where('cancelled', 1)->count(),
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


    //-------------- Edit Data Page ---------------\\
    
    public function edit(Appointment $appointment)
    {
		return view('admin.appointment.create', ['item' => $appointment]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(UpdateRequest $request, Appointment $appointment)
    {

        $data = $request->only(['name', 'description']);

        $appointment->update($data);
		
		session()->flash('success', 'Appointment updated successfully');
		
		return redirect(route('appointment.index'));
    }


    //-------------- Disable Data  ---------------\\

    public function disable(Request $request)
    {
        $item     = Sector::where('id', $request->id)->first();

        if($item->disable == 1)
        {
            $disable = 0;
        }
        elseif($item->disable == 0)
        {
            $disable = 1;
        }

        $item->disable = $disable;
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
        ]);
    }
   
}
