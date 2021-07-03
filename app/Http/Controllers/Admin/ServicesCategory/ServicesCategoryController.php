<?php

namespace App\Http\Controllers\Admin\ServicesCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Sector;
use App\Models\Categories;
use App\Http\Requests\Services\AddRequest;
use App\Http\Requests\Services\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Services\NewCategoryRequest;

class ServicesCategoryController extends Controller
{

    //-------------- Get All Data ---------------\\

    public function index()
    {
		$items       = Categories::orderBy('id','desc')->get();
		
        return view('admin.servicescategory.index', [
            'items' => $items,
            'total_rows' => Categories::all()->count(),
        ]);
    }

    
    //-------------- Create New Data Page ---------------\\

    public function create()
    {
        return view('admin.servicescategory.create');
    }
  

    //-------------- Store New Category ---------------\\

    public function store(NewCategoryRequest $request)
    {
            $category =  Categories::create([
                'name' => $request->name,
            ]);
            
            $request->session()->flash('success', 'category created successfully');
            
            return redirect(route('servicescategory.index'));
    }


    //-------------- Edit Category ---------------\\

    public function edit($id)
    {
        $category = Categories::find($id);
		return view('admin.servicescategory.create', [
            'item' => $category
        ]);
    }    



    //-------------- Update Category  ---------------\\

    public function update(NewCategoryRequest $request, Categories $category)
    {
        $category->update([
            'name' => $request->name,
        ]);
		
		session()->flash('success', 'Service updated successfully');
		
		return redirect(route('servicescategory.index'));
    }




}
