<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Branches;
use App\Models\Sector;
use App\Models\User;
use App\Http\Requests\Appointment\AddRequest;
use App\Http\Requests\Appointment\UpdateRequest;
use Illuminate\Support\Facades\Storage;

use Image;

class AppointmentController extends Controller
{

    //-------------- Get All Data ---------------\\

    public function index()
    {
		$items       = Appointment::orderBy('id','desc')->get();
		
        return view('admin.sectors.index', [
            'items' => $items,
            'total_rows' => Appointment::all()->count(),
        ]);
    }

    
    //-------------- Create New Data Page ---------------\\

    public function create()
    {
		$branches       = Branches::where('disable', 0)->orderBy('id','desc')->get();

		return view('admin.appointment.create', [
            'branches' => $branches
            ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {

            $appointment =  Appointment::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image,
            ]);
            
            $request->session()->flash('success', 'Appointment created successfully');
            
            return redirect(route('appointment.index'));
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
        }

        return view('admin.modals.appointment_next_step', [
            'request'      => $request,
            'sectors'      => $sectors,
            'branch'       => $branch,
        ]);

    }


    //-------------- Prev Step ---------------\\

    public function prev(Request $request)
    {
        
    }
   
}
