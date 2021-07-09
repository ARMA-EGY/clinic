<?php

namespace App\Http\Controllers\Admin\Xrays;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Patients;
use App\Models\Xrays;
use App\Models\XrayImages;
use App\Http\Requests\Xrays\AddRequest;
use App\Http\Requests\Xrays\UpdateRequest;
use Illuminate\Support\Facades\Storage;

use Image;

class XraysController extends Controller
{

    //-------------- Get All Data ---------------\\

    public function index()
    {
        $user        = auth()->user();
		$items       = Xrays::orderBy('id','desc')->get();
		
        return view('admin.xrays.index', [
            'items' => $items,
            'total_rows' => Xrays::all()->count(),
        ]);
    }

    
    //-------------- Create New Data ---------------\\

    public function create()
    {
        $user = auth()->user();
		$patients       = Patients::select('id', 'name', 'phone')->orderBy('id','desc')->get();
        
        return view('admin.xrays.create', [
            'patients' => $patients,
            'patients_count' => count($patients),
            ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {
            $user = auth()->user();

            $xray = Xrays::create([
                'name' => $request->name,
                'patient_id' => $request->patient_id,
                'appointment_id' => $request->appointment_id,
            ]);

            $xray_id = $xray->id;

            for ($i = 0; $i < count($request->image); $i++) 
            {
                $image = $request->file('image')[$i];
                $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/xrays');
                ini_set('memory_limit', '256M');
                $img = Image::make($image->getRealPath());
                $img->resize(1280, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['imagename']);

                $xray_image = 'images/xrays/'.$input['imagename'];

                $xray_images = XrayImages::create([
                    'image' => $xray_image,
                    'xray_id' => $xray_id
                ]);
            }
            
            if($xray_images)
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


    //-------------- Edit Data ---------------\\
    
    public function edit(Xrays $xray)
    {
        $user               = auth()->user();
		$patients           = Patients::select('id', 'name', 'phone')->orderBy('id','desc')->get();
		$patient            = Patients::where('id', $xray->patient_id)->first();
		$appointments       = Appointment::where('patient_id', $xray->patient_id)->orderBy('id','desc')->get();
        $xray_images        = XrayImages::where('xray_id', $xray->id)->get();

		return view('admin.xrays.create', [
            'item'              => $xray,
            'xray_images'       => $xray_images,
            'patient'           => $patient,
            'appointments'      => $appointments,
            'patients'          => $patients,
            'patients_count'    => count($patients),
            ]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(UpdateRequest $request, Xrays $xray)
    {
        $user = auth()->user();

        $data       = $request->only(['name', 'appointment_id', 'patient_id']);
        $xray_id    = $xray->id;

        if($request->hasfile('image'))
        {
            for ($i = 0; $i < count($request->image); $i++) 
            {
                $image = $request->file('image')[$i];
                $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/xrays');
                ini_set('memory_limit', '256M');
                $img = Image::make($image->getRealPath());
                $img->resize(1280, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['imagename']);

                $xray_image = 'images/xrays/'.$input['imagename'];

                $xray_images = XrayImages::create([
                    'image' => $xray_image,
                    'xray_id' => $xray_id
                ]);
            }
        }

        $xray->update($data);

        if($xray)
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

    //-------------- Get Patient Info ---------------\\

    public function patientinfotable(Request $request)
    {
		$patient       = Patients::where('id', $request->id)->first();
		
        return view('admin.modals.patient_info_table', [
            'patient'        => $patient,
        ]);
    }

    //-------------- Get Appointment Info ---------------\\

    public function appointmentinfotable(Request $request)
    {
		$appointments       = Appointment::where('patient_id', $request->id)->orderBy('id','desc')->get();
		
        return view('admin.modals.appointment_info_table', [
            'appointments'        => $appointments,
        ]);
    }
   
}
