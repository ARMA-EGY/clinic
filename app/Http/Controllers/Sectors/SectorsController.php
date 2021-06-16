<?php

namespace App\Http\Controllers\Sectors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sector;
use App\Http\Requests\Sectors\AddRequest;
use App\Http\Requests\Sectors\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class SectorsController extends Controller
{

    //-------------- Get All Data ---------------\\

    public function index()
    {
		$items       = Sector::orderBy('id','desc')->get();
		
        return view('admin.sectors.index', [
            'items' => $items,
            'total_rows' => Sector::all()->count(),
        ]);
    }


    //-------------- Get Active Data ---------------\\

    public function active()
    {
		$items       = Sector::where('disable', 0)->orderBy('id','desc')->get();
		
        return view('admin.sectors.active', [
            'items' => $items,
            'total_rows' => Sector::where('disable', 0)->count(),
        ]);
    }


    //-------------- Get Deactive Data ---------------\\

    public function deactive()
    {
		$items       = Sector::where('disable', 1)->orderBy('id','desc')->get();
		
        return view('admin.sectors.deactive', [
            'items' => $items,
            'total_rows' => Sector::where('disable', 1)->count(),
        ]);
    }

    
    //-------------- Create New Data Page ---------------\\

    public function create()
    {
        return view('admin.sectors.create');
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {
            $branch =  Sector::create([
                'name' => $request->name,
            ]);
            
            $request->session()->flash('success', 'Sector created successfully');
            
            return redirect(route('sectors.index'));
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit(Sector $sector)
    {
		return view('admin.sectors.create', ['item' => $sector]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(UpdateRequest $request, Sector $sector)
    {
        $sector->update([
            'name' => $request->name,
        ]);
		
		session()->flash('success', 'Sector updated successfully');
		
		return redirect(route('sectors.index'));
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
   
}
