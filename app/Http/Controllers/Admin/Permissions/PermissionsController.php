<?php

namespace App\Http\Controllers\Admin\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patients;
use App\Http\Requests\Patients\AddRequest;
use Illuminate\Support\Facades\Storage;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{

    //-------------- Get All Patient ---------------\\

    public function index()
    {
        $roles = Role::all();
        //dd($role->permissions()->get());
		
        return view('admin.permissions.index', [
            'roles' => $roles,
            'roles_count' => count($roles),
        ]);
    }




    
    //-------------- Create New Patient Page ---------------\\

    public function create()
    {
       /* return view('admin.patients.create');*/
    }


    //-------------- Store New Patient ---------------\\

    public function store(AddRequest $request)
    {
          /*  $patients =  Patients::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'identifiation' => $request->identifiation,
                'dateofbirth' => $request->dateofbirth,
                'age' => $request->age,
                'gender' => $request->gender,
                'nationality' => $request->nationality,
            ]);
            
            $request->session()->flash('success', 'Patient created successfully');
            
            return redirect(route('patients.index'));*/
    }


    //-------------- Edit Patient Page ---------------\\
    
    public function edit($role_id)
    {
        $role = Role::findById($role_id);
        $rolePermissions = $role->permissions()->get();
        $permissions = Permission::all();
		return view('admin.permissions.edit', [
         'role' => $role ,
         'rolePermissions' => $rolePermissions ,
         'permissions' => $permissions]);
    }

    
    //-------------- Update Patient  ---------------\\

    public function update(Request $request, $role_id)
    {
        $role = Role::findById($role_id);
        $role->syncPermissions($request->permissions);
		
		session()->flash('success', 'Role updated successfully');
		
		return redirect(route('permissions.index'));
    }



   
}
