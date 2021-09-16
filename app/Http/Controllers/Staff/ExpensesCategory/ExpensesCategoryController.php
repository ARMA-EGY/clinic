<?php

namespace App\Http\Controllers\Staff\ExpensesCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sector;
use App\Models\Expenses;
use App\Models\ExpensesCategories;
use App\Http\Requests\Services\AddRequest;
use App\Http\Requests\Services\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Services\NewCategoryRequest;

class ExpensesCategoryController extends Controller
{

    //-------------- Get All Data ---------------\\

    public function index()
    {
		$items       = ExpensesCategories::orderBy('id','desc')->get();
		
        return view('staff.expensescategory.index', [
            'items' => $items,
            'total_rows' => count($items),
        ]);
    }

    
    //-------------- Create New Data Page ---------------\\

    public function create()
    {
        return view('staff.expensescategory.create');
    }
  

    //-------------- Store New Category ---------------\\

    public function store(NewCategoryRequest $request)
    {
            $category =  ExpensesCategories::create([
                'name' => $request->name,
            ]);
            
            $request->session()->flash('success', 'category created successfully');
            
            return redirect(route('staff-expensescategory.index'));
    }


    //-------------- Edit Category ---------------\\

    public function edit($id)
    {
        $category = ExpensesCategories::find($id);
		return view('staff.expensescategory.create', [
            'item' => $category
        ]);
    }    



    //-------------- Update Category  ---------------\\

    public function update(NewCategoryRequest $request, $id)
    {
        $category = ExpensesCategories::find($id);
        $category->update([
            'name' => $request->name,
        ]);
		
		session()->flash('success', 'Category updated successfully');
		
		return redirect(route('staff-expensescategory.index'));
    }




}
