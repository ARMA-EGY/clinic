<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Sector;
use App\Models\Categories;
use App\Http\Requests\Services\AddRequest;
use App\Http\Requests\Services\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{

    //-------------- Get All Data ---------------\\

    public function index()
    {
        $user = auth()->user();
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
        $user = auth()->user();
        $Categories = Categories::all();
        return view('admin.services.create', [
            'sectors'    => Sector::where('disable', 0)->orderBy('id','desc')->get(),
            'Categories' => $Categories
            ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {
            $user = auth()->user();
            $service =  Services::create([
                'name' => $request->name,
                'number' => $request->number,
                'price' => $request->price,
                'sector_id' => $request->sector_id,
                'category_id'=> $request->category_id,
            ]);
            
            $request->session()->flash('success', 'Service created successfully');
            
            return redirect(route('services.index'));
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit(Services $service)
    {
        $user = auth()->user();
        $Categories = Categories::all();
		return view('admin.services.create', [
            'item' => $service,
            'sectors'    => Sector::where('disable', 0)->orderBy('id','desc')->get(),
            'Categories' => $Categories
        ]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(UpdateRequest $request, Services $service)
    {
        $user = auth()->user();
        $service->update([
            'name' => $request->name,
            'number' => $request->number,
            'price' => $request->price,
            'sector_id' => $request->sector_id,
            'category_id'=> $request->category_id,
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
