<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sector;
use App\Models\Branches;
use App\Http\Requests\Doctors\AddRequest;
use App\Http\Requests\Doctors\UpdateRequest;
use Illuminate\Support\Facades\Storage;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Image;

class DoctorsController extends Controller
{

    use RegistersUsers;

    //-------------- Get All Data ---------------\\

    public function index()
    {
		$items       = User::where('role', 'Doctor')->orderBy('id','desc')->get();
		
        return view('admin.doctors.index', [
            'items' => $items,
            'total_rows' => User::where('role', 'Doctor')->count(),
        ]);
    }


    //-------------- Get Active Data ---------------\\

    public function active()
    {
		$items       = User::where('disable', 0)->orderBy('id','desc')->get();
		
        return view('admin.services.active', [
            'items' => $items,
            'total_rows' => User::where('disable', 0)->count(),
        ]);
    }


    //-------------- Get Deactive Data ---------------\\

    public function deactive()
    {
		$items       = User::where('disable', 1)->orderBy('id','desc')->get();
		
        return view('admin.services.deactive', [
            'items' => $items,
            'total_rows' => User::where('disable', 1)->count(),
        ]);
    }

    
    //-------------- Create New Data Page ---------------\\

    public function create()
    {
        return view('admin.doctors.create', [
            'branches'   => Branches::where('disable', 0)->orderBy('id','desc')->get(),
            'sectors'    => Sector::where('disable', 0)->orderBy('id','desc')->get(),
            ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {

            $certificate_file   = '';
            $contract_file      = '';

            if($request->hasfile('avatar'))
            {
                $image = $request->file('avatar');
                $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            
                $destinationPath = public_path('/images/avatars');
                ini_set('memory_limit', '256M');
                $img = Image::make($image->getRealPath());
                $img->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['imagename']);

                $avatar = 'images/avatars'.$input['imagename'];
            }
            else
            {
                if ($request->gender == 'Male')
                {
                    $avatar = 'images/male.png';
                }
                else
                {
                    $avatar = 'images/female.png';
                }
            }

            if($request->hasfile('certificate_file'))
            {
                $certificate_file = $request->certificate_file->store('files/certificate', 'public');
            }

            if($request->hasfile('contract_file'))
            {
                $contract_file = $request->contract_file->store('files/contract', 'public');
            }

            $doctor =  User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'gender' => $request->gender,
                'birthdate' => $request->birthdate,
                'nationality' => $request->nationality,

                'branch_id' => $request->branch_id,
                'sector_id' => $request->sector_id,
                'working_hours' => $request->working_hours,
                'salary' => $request->salary,
                'hiring_date' => $request->hiring_date,
                'profit_ratio' => $request->profit_ratio,
                'license_number' => $request->license_number,

                'certificate_file' => $certificate_file,
                'contract_file' => $contract_file,
                'contract_duration' => $request->contract_duration,
                'contract_end_date' => $request->contract_end_date,

                'avatar' => $avatar,

                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);
            
            $request->session()->flash('success', 'Doctor Added successfully');
            
            return redirect(route('doctors.index'));
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit(User $doctor)
    {
		return view('admin.doctors.create', [
            'item' => $doctor,
            'branches'   => Branches::where('disable', 0)->orderBy('id','desc')->get(),
            'sectors'    => Sector::where('disable', 0)->orderBy('id','desc')->get(),
        ]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(UpdateRequest $request, User $doctor)
    {

        $data = $request->only(['name', 'phone', 'email', 'gender', 'birthdate', 'nationality', 'branch_id', 'sector_id', 'working_hours', 'salary', 'hiring_date', 'profit_ratio', 'license_number', 'contract_duration', 'contract_end_date']);

        if($request->hasfile('avatar'))
        {
            $image = $request->file('avatar');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        
            $destinationPath = public_path('/images/avatars');
            ini_set('memory_limit', '256M');
            $img = Image::make($image->getRealPath());
            $img->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $avatar = 'images/avatars'.$input['imagename'];

            $data['avatar'] = $avatar;
        }
           
        if($request->hasfile('certificate_file'))
        {
            $certificate_file = $request->certificate_file->store('files/certificate', 'public');
            $data['certificate_file'] = $certificate_file;
        }

        if($request->hasfile('contract_file'))
        {
            $contract_file = $request->contract_file->store('files/contract', 'public');
            $data['contract_file'] = $contract_file;
        }

        $doctor->update($data);
		
		session()->flash('success', 'Doctor updated successfully');
		
		return redirect(route('doctors.index'));
    }


    //-------------- Disable Data  ---------------\\

    public function disable(Request $request)
    {
        $item     = User::where('id', $request->id)->first();

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
   
}
