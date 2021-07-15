<?php

namespace App\Http\Controllers\Admin\AppointmentServices;

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

    public function store(AddRequest $request)
    {

        $service =  appointmentServices::create([
            'appointment_id' => $request->appointment_id,
            'service_id' => $request->service,
            'body_part' => $request->body_part,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);
            
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

    public function remove(Request $request)
    {
        $service = appointmentServices::find($request->id);
        $service->delete(); 
    }
   
}
