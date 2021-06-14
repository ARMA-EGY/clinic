<?php

namespace App\Http\Controllers\Branches;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branches;
use App\Http\Requests\Branches\AddRequest;
use App\Http\Requests\Branches\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$categories       = ProductCategory::orderBy('id','desc')->get();
		
        return view('admin.product_categories.index', [
            'categories' => $categories,
            'categories_count' => ProductCategory::all()->count(),
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.product_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ProductCategoryRequest $request)
    {
            // Category::create([
            //     'name' => $request->name
            // ]);


                $category =  ProductCategory::create([
                'name' => $request->name,
            ]);
            
            $request->session()->flash('success', 'Category created successfully');
            
            return redirect(route('products-categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $products_category)
    {
		return view('admin.product_categories.create', ['category' => $products_category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductCategoryRequest $request, ProductCategory $products_category)
    {
        //
        $products_category->update([
            'name' => $request->name
        ]);
		
		session()->flash('success', 'Category updated successfully');
		
		return redirect(route('products-categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $category)
    {
        //
		
		$category->delete();
		
		session()->flash('success', 'Category deleted successfully');
		
		return redirect(route('products-categories.index'));
    }

    
    //======== Remove Category ======== 
    public function removecategory(Request $request)
    {
        $item           = ProductCategory::where('id', $request->id)->first();
        $products       = Product::where('category_id', $request->id);
        $products2      = Product::where('category_id', $request->id)->get();

        foreach ($products2 as $product) 
        {
            Storage::disk('public')->delete($product->image);
        }

        $item->delete();
        $products->delete();
    }
}
