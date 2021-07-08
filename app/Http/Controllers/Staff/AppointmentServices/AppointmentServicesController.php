<?php

namespace App\Http\Controllers\Staff\AppointmentServices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Branches;
use App\Models\Sector;
use App\Models\Patients;
use App\Models\User;
use App\Models\Services;
use App\Models\appointmentServices;
use App\Http\Requests\AppointmentServices\AddRequest;
use Illuminate\Support\Facades\Storage;

class AppointmentServicesController extends Controller
{

    //-------------- Get All Data ---------------\\

    public function index()
    {
		$items       = Appointment::orderBy('id','desc')->get();
		
        return view('staff.appointment.index', [
            'items' => $items,
            'total_rows' => Appointment::all()->count(),
        ]);
    }


    
    //-------------- Get Today Data ---------------\\

    public function pending()
    {
        $today          = date('Y-m-d');
		$items       = Appointment::where('appointment_date', $today)->orderBy('id','desc')->get();
		
        return view('staff.appointment.today', [
            'items' => $items,
            'total_rows' => Appointment::where('appointment_date', $today)->count(),
        ]);
    }

    //-------------- Get Done Data ---------------\\

    public function accepted()
    {
        $today          = date('Y-m-d');
		$items       = Appointment::where('appointment_date', '<', $today)->orderBy('id','desc')->get();
		
        return view('staff.appointment.done', [
            'items' => $items,
            'total_rows' => Appointment::where('appointment_date', '<', $today)->count(),
        ]);
    }

    //-------------- Get Cancelled Data ---------------\\

    public function rejected()
    {
		$items       = Appointment::where('cancelled', 1)->orderBy('id','desc')->get();
		
        return view('staff.appointment.cancelled', [
            'items' => $items,
            'total_rows' => Appointment::where('cancelled', 1)->count(),
        ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {
        foreach($request->service as $service)
        {
            $service =  appointmentServices::create([
                'appointment_id' => $request->appointment_id,
                'service_id' => $service,
                'body_part' => $request->body_part,
                'status' => 'pending',
            ]);

        }   
            if($service)
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
		return view('staff.appointment.create', ['item' => $appointment]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(UpdateRequest $request, Appointment $appointment)
    {

        $data = $request->only(['name', 'description']);

        $appointment->update($data);
		
		session()->flash('success', 'Appointment updated successfully');
		
		return redirect(route('staff-appointment.index'));
    }


   
}
