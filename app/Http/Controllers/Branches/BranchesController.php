<?php

namespace App\Http\Controllers\Branches;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branches;
use App\Models\Sector;
use App\Http\Requests\Branches\AddRequest;
use App\Http\Requests\Branches\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class BranchesController extends Controller
{

    //-------------- Get All Branches ---------------\\

    public function index()
    {
        $user = auth()->user();
        if(!$user->hasPermissionTo('all branches'))
        {
            return redirect(route('home'));
        }
		$items       = Branches::orderBy('id','desc')->get();
		
        return view('admin.branches.index', [
            'items' => $items,
            'total_rows' => Branches::all()->count(),
        ]);
    }


    //-------------- Get Active Branches ---------------\\

    public function active()
    {
        $user = auth()->user();
        if(!$user->hasPermissionTo('active branches'))
        {
            return redirect(route('home'));
        }
		$items       = Branches::where('disable', 0)->orderBy('id','desc')->get();
		
        return view('admin.branches.active', [
            'items' => $items,
            'total_rows' => Branches::where('disable', 0)->count(),
        ]);
    }


    //-------------- Get Deactive Branches ---------------\\

    public function deactive()
    {
        $user = auth()->user();
        if(!$user->hasPermissionTo('deactivated branches'))
        {
            return redirect(route('home'));
        }
		$items       = Branches::where('disable', 1)->orderBy('id','desc')->get();
		
        return view('admin.branches.deactive', [
            'items' => $items,
            'total_rows' => Branches::where('disable', 1)->count(),
        ]);
    }

    
    //-------------- Create New Branch Page ---------------\\

    public function create()
    {
        $user = auth()->user();
        if(!$user->hasPermissionTo('create branch'))
        {
            return redirect(route('home'));
        }
        
        return view('admin.branches.create', [
            'sectors'    => Sector::where('disable', 0)->orderBy('id','desc')->get(),
            ]);
    }


    //-------------- Store New Branch ---------------\\

    public function store(AddRequest $request)
    {
            $user = auth()->user();
            if(!$user->hasPermissionTo('create branch'))
            {
                return redirect(route('home'));
            }
            $branch =  Branches::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'city' => $request->city,
                'address' => $request->address,
            ]);

            if($request->sectors)
            {
                $branch->sectors()->attach($request->sectors);
            }
            
            $request->session()->flash('success', 'Branch created successfully');
            
            return redirect(route('branches.index'));
    }


    //-------------- Edit Branch Page ---------------\\
    
    public function edit(Branches $branch)
    {
        $user = auth()->user();
        if(!$user->hasPermissionTo('edit branch'))
        {
            return redirect(route('home'));
        }
		return view('admin.branches.create', [
            'item' => $branch,
            'sectors'    => Sector::where('disable', 0)->orderBy('id','desc')->get(),
            ]);
    }

    
    //-------------- Update Branch  ---------------\\

    public function update(UpdateRequest $request, Branches $branch)
    {
        $user = auth()->user();
        if(!$user->hasPermissionTo('edit branch'))
        {
            return redirect(route('home'));
        }
        $branch->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
        ]);

        if($request->sectors)
        {
            $branch->sectors()->sync($request->sectors);
        }
		
		session()->flash('success', 'Branch updated successfully');
		
		return redirect(route('branches.index'));
    }


    //-------------- Disable Branch  ---------------\\

    public function disablebranch(Request $request)
    {
        $item     = Branches::where('id', $request->id)->first();

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
