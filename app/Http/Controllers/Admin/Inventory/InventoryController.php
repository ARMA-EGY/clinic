<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Branches;
use App\Models\InventoryHistory;
use App\Models\InventoryTransaction;
use App\Http\Requests\Inventory\AddRequest;
use App\Http\Requests\Inventory\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class InventoryController extends Controller
{

    //-------------- Get All Data ---------------\\

    public function index()
    {

		$inventories       = Inventory::orderBy('id','desc')->get();
		
        return view('admin.inventory.index', [
            'items' => $inventories,
            'items_count' => count($inventories),
        ]);
    }


    //-------------- Get Single Data ---------------\\    

    public function show(Inventory $inventory)
    {
        $url = route('inventory.show',$inventory->id);
        $row = '<tr class="parent">
        <input type="hidden" name="inventory_id[]" value="'.$inventory->id.'" >
                    <td>'.$inventory->id.'</td>
                    <td>'.$inventory->name.'</td>
                    <td id="stock_'.$inventory->id.'">'.$inventory->stock.'</td>
                    <td><input type="number" min="1" id="quantity_'.$inventory->id.'" name="quantity[]" class=" form-control"   > </td>
                    <td>
                    <select class="typechs form-control item" name="type[]">            
                            <option value="addition">addition</option>
                            <option value="subtraction" data-id="'.$inventory->id.'">subtraction</option>
                    </select> 
                    </td>
                    <td>
                    <a data-toggle="tooltip" data-placement="top" title="" data-id="'.$inventory->id.'" data-itemname="'.$inventory->name.'" data-url="'.$url.'" class="btn btn-secondary btn-sm mx-1 px-3 trash-item"> <i class="fa fa-trash"></i> </a>
                    </td>
                </tr>';
        return $row;
    }  
    
    //-------------- Get Adjustment Data ---------------\\    

    public function showAdjustment(Request $request)
    {
		$transaction            = InventoryTransaction::where('id',$request->id)->first();
        $adjustments            = InventoryHistory::where('transaction_id',$transaction->id)->get();

        return view('admin.modals.show_adjustment',[
            'transaction'    => $transaction,
            'adjustments'    => $adjustments ,
        ]);
    }   

    //-------------- Create New Data ---------------\\

    public function create()
    {
		$items       = Branches::orderBy('id','desc')->get();
        return view('admin.inventory.create',['items' => $items]);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {
            $patients =  Inventory::create([
                'name' => $request->name,
                'stock' => $request->stock,
                'price' => $request->price,
                'expire_date' => $request->expire_date,
            ]);
            
            $request->session()->flash('success', 'Item created successfully');
            
            return redirect(route('inventory.index'));
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit(Inventory $inventory)
    {
		return view('admin.inventory.create', [
            'item' => $inventory,
            ]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(UpdateRequest $request, Inventory $inventory)
    {

        $inventory->update([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'expire_date' => $request->expire_date,
        ]);
		
		session()->flash('success', 'Item updated successfully');
		
		return redirect(route('inventory.index'));
    }


    //-------------- Get All Data ---------------\\

    public function adjustmentIndex()
    {

        $transactions       = InventoryTransaction::orderBy('created_at','desc')->get();
        return view('admin.inventory.adjustment.index', [
            'items' => $transactions,
            'items_count' => count($transactions),
        ]);
    }

    public function adjustmentCreate()
    {
        $inventories       = Inventory::orderBy('id','desc')->get();
        return view('admin.inventory.adjustment.create',[
            'items' => $inventories,
        ]);
    }
    

    
    //-------------- Store New Data ---------------\\

    public function adjustmentStore(Request $request)
    {
        if(isset($request->notes))
        {
            $InventoryTransaction =  InventoryTransaction::create([
                'notes' => $request->notes,
                'items_num' => count($request->quantity),
            ]);
        }else{
            $InventoryTransaction =  InventoryTransaction::create([
                'items_num' => count($request->quantity),
            ]);            
        }


        $i=0;
        foreach($request->inventory_id as $id)
        {
            
            $InventoryHistory =  InventoryHistory::create([
                'inventory_id' => $id,
                'transaction_id' => $InventoryTransaction->id,
                'type' => $request->type[$i],
                'quantity' => $request->quantity[$i],
            ]);
            if($request->type[$i] == "addition")
            {
                $inventory = Inventory::find($id);
                $stock = $inventory->stock + $request->quantity[$i];
                $inventory->update([
                    'stock' => $stock,
                ]);
            }elseif($request->type[$i] == "subtraction"){
                $inventory = Inventory::find($id);
                $stock = $inventory->stock - $request->quantity[$i];
                $inventory->update([
                    'stock' => $stock,
                ]);
            }
            $i++;
        }

            
        $request->session()->flash('success', 'Adjustment created successfully');
        
        return redirect(route('index-adjustment'));
    }
   
}