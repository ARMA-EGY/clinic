<?php

namespace App\Http\Controllers\Admin\Expenses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Sector;
use App\Models\Categories;
use App\Models\Expenses;
use App\Models\ExpensesCategories;
use App\Models\DoctorExpenses;
use App\Models\Branches;
use App\Models\User;
use App\Http\Requests\Expenses\AddRequest;
use App\Http\Requests\Expenses\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use DB;

class ExpensesController extends Controller
{

    //-------------- Get All Data ---------------\\

    public function index()
    {
        $user = auth()->user();
		$items       = Expenses::orderBy('id','desc')->get();
		
        return view('admin.expenses.index', [
            'items' => $items,
            'total_rows' => count($items),
        ]);
    }

    
    //-------------- Create New Data Page ---------------\\

    public function create()
    {
        $user = auth()->user();
		$branches       = Branches::where('disable', 0)->orderBy('id','desc')->get();
        $Categories     = ExpensesCategories::all();
        return view('admin.expenses.create', [
            'Categories' => $Categories,
            'branches' => $branches,
            ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {
        $user = auth()->user();
             
        DB::transaction(function() use ($request, $user) {  

            $expense =  Expenses::create([
                'name' => $request->name,
                'price' => $request->price,
                'category_id'=> $request->category_id,
                'branch_id'=> $request->branch_id,
                'user_id'  => $user->id,
            ]);

            $branches = Branches::with('doctor')->where('disable',0)->get();
            
            $branchExpense = $request->price / count($branches);
            
            foreach($branches as $branch)
            {
                $doctorCnt = count($branch->doctor);

                if($doctorCnt > 0)
                {
                    $doctorExpense = $branchExpense / $doctorCnt;
                
                    foreach($branch->doctor as $doctor)
                    {
                        DoctorExpenses:: create([
                            'doctor_id' => $doctor->id,
                            'expense_id' => $expense->id,
                            'price'=> $branchExpense,
                        ]);
                    }
                }

            }

        });     
            $request->session()->flash('success', 'Expense created successfully');
            
            return redirect(route('expenses.index'));
    }


    //-------------- Edit Data Page ---------------\\
    
    /*public function edit(Services $service)
    {
        $user = auth()->user();
        $Categories = Categories::all();
		return view('admin.services.create', [
            'item' => $service,
            'sectors'    => Sector::where('disable', 0)->orderBy('id','desc')->get(),
            'Categories' => $Categories
        ]);
    }*/

    
    //-------------- Update Data  ---------------\\

    /*public function update(UpdateRequest $request, Services $service)
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
    }*/

    public function delete(Request $request)
    {

        $expense = Expenses::find($request->id);
        DB::transaction(function() use ($expense) { 
            
            DoctorExpenses::where('expense_id',$expense->id)->delete();
            $expense->delete();

        });

        
    }

   
}
