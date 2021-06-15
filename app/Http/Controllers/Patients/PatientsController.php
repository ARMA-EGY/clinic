<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patients;
use App\Http\Requests\Patients\AddRequest;
use Illuminate\Support\Facades\Storage;

class PatientsController extends Controller
{

    //-------------- Get All Patient ---------------\\

    public function index()
    {
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
        return view('admin.patients.create');
    }


    //-------------- Store New Patient ---------------\\

    public function store(AddRequest $request)
    {
            $patients =  Patients::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'identifiation' => $request->identifiation,
                'dateofbirth' => $request->dateofbirth,
                'age' => $request->age,
                'gender' => $request->gender,
                'nationality' => $request->nationality,
            ]);
            
            $request->session()->flash('success', 'Patient created successfully');
            
            return redirect(route('patients.index'));
    }


    //-------------- Edit Patient Page ---------------\\
    
    public function edit(Patients $patient)
    {
		return view('admin.patients.create', ['patient' => $patient]);
    }

    
    //-------------- Update Patient  ---------------\\

    public function update(AddRequest $request, Patients $patient)
    {
        $patient->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'identifiation' => $request->identifiation,
            'dateofbirth' => $request->dateofbirth,
            'age' => $request->age,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
        ]);
		
		session()->flash('success', 'Patient updated successfully');
		
		return redirect(route('patients.index'));
    }


    //-------------- Disable Patient  ---------------\\

    public function disablebranch(Request $request)
    {

    }
   
}
