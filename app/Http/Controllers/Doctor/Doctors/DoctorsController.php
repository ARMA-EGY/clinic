<?php

namespace App\Http\Controllers\Doctor\Doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sector;
use App\Models\Branches;
use App\Http\Requests\Doctors\AddRequest;
use App\Http\Requests\Doctors\UpdateRequest;
use App\Http\Requests\Doctors\ChangePassword;
use Illuminate\Support\Facades\Storage;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Image;

class DoctorsController extends Controller
{

    use RegistersUsers;




 





    //-------------- Edit Data Page ---------------\\
    
    public function edit(User $doctor)
    {
        $user = auth()->user();
		return view('admin.doctors.create', [
            'item' => $doctor,
            'branches'   => Branches::where('disable', 0)->orderBy('id','desc')->get(),
            'sectors'    => Sector::where('disable', 0)->orderBy('id','desc')->get(),
        ]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(UpdateRequest $request, User $doctor)
    {

        $user = auth()->user();
        if(!$user->hasPermissionTo('edit doctors'))
        {
            return redirect(route('home'));
        } 
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

            $avatar = 'images/avatars/'.$input['imagename'];

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


    //-------------- Show Data  ---------------\\

    public function profile()
    {
        $user = auth()->user();
        $item     = User::where('id', $user->id)->first();

        return view('doctor.profile', [
            'item' => $item,
        ]);
    }

    //======== Change Password ======== 
    public function changepassword(ChangePassword $request)
    {
        $user = auth()->user();

        $password    = Hash::make($request->password);

        $data['password'] = $password;
        $user->update($data);
        
        session()->flash('success', 'Your Password is updated successfully');
        return redirect(route('doctor-doctors.profile'));

    } 



   
}
