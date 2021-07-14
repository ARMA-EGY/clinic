<?php

namespace App\Http\Controllers\Admin\Pledges;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patients;
use App\Models\Pledges;
use App\Models\PledgeFile;
use App\Http\Requests\Pledges\AddRequest;
use Illuminate\Support\Facades\Storage;

class PledgesController extends Controller
{

    //-------------- Get All Data ---------------\\

    public function index()
    {
        $user        = auth()->user();
        if(!$user->hasPermissionTo('all pledge'))
        {
            return redirect(route('home'));
        }
		$items       = Pledges::where('status', 1)->orderBy('id','desc')->get();
		
        return view('staff.pledges.index', [
            'items' => $items,
            'total_rows' => Pledges::where('status', 1)->count(),
        ]);
    }

    
    //-------------- Create New Data ---------------\\

    public function create()
    {
        $user           = auth()->user();
        if(!$user->hasPermissionTo('create pledge'))
        {
            return redirect(route('home'));
        }
		$patients       = Patients::select('id', 'name', 'phone')->orderBy('id','desc')->get();
		$files          = PledgeFile::all();
        
        return view('staff.pledges.create', [
            'files' => $files,
            'patients' => $patients,
            'patients_count' => count($patients),
            ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {
            $user       = auth()->user();
            if(!$user->hasPermissionTo('create pledge'))
            {
                return redirect(route('home'));
            }
            $patient    = Patients::where('id', $request->patient_id)->first();
            $exist      = Pledges::where('patient_id', $request->patient_id)->where('file_id', $request->file_id)->first();

            if($exist)
            {
                $pledge = $exist;
            }
            else
            {
                $pledge = Pledges::create([
                    'patient_id' => $request->patient_id,
                    'file_id' => $request->file_id,
                    'signature' => '',
                ]);
            }

            return view('staff.modals.qr_button', [
                'pledge'        => $pledge,
            ]);
    }


    //-------------- Get Patient Info ---------------\\

    public function patientinfotable(Request $request)
    {
		$patient       = Patients::where('id', $request->id)->first();
		
        return view('staff.modals.patient_info_table', [
            'patient'        => $patient,
        ]);
    }


    //-------------- Pledge File ---------------\\

    public function file($id)
    {
		$pledge       = Pledges::where('id', $id)->first();
		
        return view('pledges.'.$pledge->file->filename, [
            'pledge'        => $pledge,
        ]);
    }


    //-------------- Agreement of pledge ---------------\\

    public function agree(Request $request)
    {
        $pledge     = Pledges::where('id', $request->id)->first();
        
        $pledge->update([
            'signature' => $request->signature,
            'status' => 1,
        ]);

        if($pledge)
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
   
}
