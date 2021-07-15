<?php

namespace App\Http\Controllers\Admin\Sectors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sector;
use App\Models\BodyParts;
use App\Http\Requests\Sectors\AddRequest;
use App\Http\Requests\Sectors\UpdateRequest;
use Illuminate\Support\Facades\Storage;

use Image;

class SectorsController extends Controller
{

    //-------------- Get All Data ---------------\\

    public function index()
    {
        $user = auth()->user();
		$items       = Sector::orderBy('id','desc')->get();
		
        return view('admin.sectors.index', [
            'items' => $items,
            'total_rows' => Sector::all()->count(),
        ]);
    }


    //-------------- Get Active Data ---------------\\

    public function active()
    {
        $user = auth()->user();
		$items       = Sector::where('disable', 0)->orderBy('id','desc')->get();
		
        return view('admin.sectors.active', [
            'items' => $items,
            'total_rows' => Sector::where('disable', 0)->count(),
        ]);
    }


    //-------------- Get Deactive Data ---------------\\

    public function deactive()
    {
        $user = auth()->user();
		$items       = Sector::where('disable', 1)->orderBy('id','desc')->get();
		
        return view('admin.sectors.deactive', [
            'items' => $items,
            'total_rows' => Sector::where('disable', 1)->count(),
        ]);
    }

    
    //-------------- Create New Data Page ---------------\\

    public function create()
    {
        $user = auth()->user();
        $bodyparts = BodyParts::all();

        return view('admin.sectors.create',[
            'bodyparts'    => $bodyparts 
        ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {
            $user = auth()->user();
            if($request->hasfile('image'))
            {
                $image = $request->file('image');
                $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            
                $destinationPath = public_path('/images/sectors');
                ini_set('memory_limit', '256M');
                $img = Image::make($image->getRealPath());
                $img->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['imagename']);

                $image = 'images/sectors/'.$input['imagename'];
            }
            else
            {
                $image = 'images/sector.png';
            }

            $sector =  Sector::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image,
            ]);

            if($request->bodyparts)
            {
                $sector->bodyparts()->attach($request->bodyparts);
            }
            
            $request->session()->flash('success', 'Sector created successfully');
            
            return redirect(route('sectors.index'));
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit(Sector $sector)
    {
        $user = auth()->user();
        $bodyparts = BodyParts::all();

		return view('admin.sectors.create', [
            'item' => $sector,
            'bodyparts'    => $bodyparts 
            ]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(UpdateRequest $request, Sector $sector)
    {

        $user = auth()->user();
        $data = $request->only(['name', 'description']);

        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        
            $destinationPath = public_path('/images/sectors');
            ini_set('memory_limit', '256M');
            $img = Image::make($image->getRealPath());
            $img->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $image = 'images/sectors/'.$input['imagename'];

            $data['image'] = $image;
        }

        $sector->update($data);

        
            $sector->bodyparts()->sync($request->bodyparts);
       
		
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
