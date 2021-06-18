<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Sector;
use App\Http\Requests\Services\AddRequest;
use App\Http\Requests\Services\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{

    //-------------- Get All Data ---------------\\

    public function index()
    {
		$items       = Services::orderBy('id','desc')->get();
		
        return view('admin.services.index', [
            'items' => $items,
            'total_rows' => Services::all()->count(),
        ]);
    }


    //-------------- Get Active Data ---------------\\

    public function active()
    {
		$items       = Services::where('disable', 0)->orderBy('id','desc')->get();
		
        return view('admin.services.active', [
            'items' => $items,
            'total_rows' => Services::where('disable', 0)->count(),
        ]);
    }


    //-------------- Get Deactive Data ---------------\\

    public function deactive()
    {
		$items       = Services::where('disable', 1)->orderBy('id','desc')->get();
		
        return view('admin.services.deactive', [
            'items' => $items,
            'total_rows' => Services::where('disable', 1)->count(),
        ]);
    }

    
    //-------------- Create New Data Page ---------------\\

    public function create()
    {
        return view('admin.services.create', [
            'sectors'    => Sector::where('disable', 0)->orderBy('id','desc')->get(),
            ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {
            $service =  Services::create([
                'name' => $request->name,
                'number' => $request->number,
                'price' => $request->price,
                'sector_id' => $request->sector_id,
            ]);
            
            $request->session()->flash('success', 'Service created successfully');
            
            return redirect(route('services.index'));
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit(Services $service)
    {
		return view('admin.services.create', [
            'item' => $service,
            'sectors'    => Sector::where('disable', 0)->orderBy('id','desc')->get(),
        ]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(UpdateRequest $request, Services $service)
    {
        $service->update([
            'name' => $request->name,
            'number' => $request->number,
            'price' => $request->price,
            'sector_id' => $request->sector_id,
        ]);
		
		session()->flash('success', 'Service updated successfully');
		
		return redirect(route('services.index'));
    }


    //-------------- Disable Data  ---------------\\

    public function disable(Request $request)
    {
        $item     = Services::where('id', $request->id)->first();

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
