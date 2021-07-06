<?php

namespace App\Http\Controllers\Admin\Patients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patients;
use App\Models\Countries;
use App\Http\Requests\Patients\AddRequest;
use Illuminate\Support\Facades\Storage;

class PatientsController extends Controller
{

    //-------------- Get All Patient ---------------\\

    public function index()
    {
        $user = auth()->user();
        if(!$user->hasPermissionTo('all patients'))
        {
            return redirect(route('home'));
        }
		$patients       = Patients::orderBy('id','desc')->get();
		
        return view('admin.patients.index', [
            'patients' => $patients,
            'patients_count' => count($patients),
        ]);
    }


    //-------------- Get Active Patient ---------------\\

    public function active()
    {

    }


    //-------------- Get Deactive Patient ---------------\\

    public function deactive()
    {

    }

    
    //-------------- Create New Patient Page ---------------\\

    public function create()
    {
        $user = auth()->user();
        if(!$user->hasPermissionTo('create patients'))
        {
            return redirect(route('home'));
        }
        return view('admin.patients.create', [
            'countries'   => Countries::all(),
            ]);
    }


    //-------------- Store New Patient ---------------\\

    public function store(AddRequest $request)
    {
            $user = auth()->user();
            if(!$user->hasPermissionTo('create patients'))
            {
                return redirect(route('home'));
            }
            $patients =  Patients::create([
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
            
            $request->session()->flash('success', 'Patient created successfully');
            
            return redirect(route('patients.index'));
    }


    //-------------- Edit Patient Page ---------------\\
    
    public function edit(Patients $patient)
    {
        $user = auth()->user();
        if(!$user->hasPermissionTo('edit patients'))
        {
            return redirect(route('home'));
        }
		return view('admin.patients.create', [
            'patient' => $patient,
            'countries'   => Countries::all(),
            ]);
    }

    
    //-------------- Update Patient  ---------------\\

    public function update(AddRequest $request, Patients $patient)
    {
        $user = auth()->user();
        if(!$user->hasPermissionTo('edit patients'))
        {
            return redirect(route('home'));
        }
        $patient->update([
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
		
		session()->flash('success', 'Patient updated successfully');
		
		return redirect(route('patients.index'));
    }


    //-------------- Disable Patient  ---------------\\

    public function disablebranch(Request $request)
    {

    }
   
}
