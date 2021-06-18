<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sector;
use App\Http\Requests\Doctors\AddRequest;
use App\Http\Requests\Doctors\UpdateRequest;
use Illuminate\Support\Facades\Storage;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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
            'sectors'    => Sector::where('disable', 0)->orderBy('id','desc')->get(),
            ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {
            if ($request->gender == 'Male')
            {
                $avatar = 'admin_assets/img/theme/avatar.png';
            }
            else
            {
                $avatar = 'admin_assets/img/theme/avatar2.png';
            }

            $doctor =  User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'gender' => $request->gender,
                'role' => $request->role,
                'sector_id' => $request->sector_id,
                'nationality' => $request->nationality,
                'salary' => $request->salary,
                'hiring_date' => $request->hiring_date,
                'birthdate' => $request->birthdate,
                'contract_duration' => $request->contract_duration,
                'working_hours' => $request->working_hours,
                'certificate' => $request->certificate,
                'avatar' => $avatar,
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
            'sectors'    => Sector::where('disable', 0)->orderBy('id','desc')->get(),
        ]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(UpdateRequest $request, User $doctor)
    {
        if ($request->gender == 'Male')
        {
            $avatar = 'admin_assets/img/theme/avatar.png';
        }
        else
        {
            $avatar = 'admin_assets/img/theme/avatar2.png';
        }

        $doctor->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'gender' => $request->gender,
            'role' => $request->role,
            'sector_id' => $request->sector_id,
            'nationality' => $request->nationality,
            'salary' => $request->salary,
            'hiring_date' => $request->hiring_date,
            'birthdate' => $request->birthdate,
            'contract_duration' => $request->contract_duration,
            'working_hours' => $request->working_hours,
            'certificate' => $request->certificate,
            'avatar' => $avatar,
        ]);
		
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
