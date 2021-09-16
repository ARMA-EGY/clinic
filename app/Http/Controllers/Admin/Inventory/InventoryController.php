<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Branches;
use App\Models\Sector;
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

		$inventories       = Inventory::orderBy('id','desc')
        ->get();

        return view('admin.inventory.index', [
            'items' => $inventories,
            'items_count' => count($inventories),
            'type' => 'all',
        ]);
    }


    //-------------- Get Single Data ---------------\\    

    public function show(Inventory $inventory)
    {
        $branch = Branches::with('sectorspv')->find($inventory->branch_id);

        $SectorsOption = "";
        foreach($branch->sectorspv as $sector)
        {
            $SectorsOption = $SectorsOption . '<option value="'.$sector->id.'">'.$sector->name.'</option>';
        }


        $url = route('inventory.show',$inventory->id);
        $row = '<tr class="parent">
        <input type="hidden" name="inventory_id[]" value="'.$inventory->id.'" >
                    <td>'.$inventory->id.'</td>
                    <td>'.$inventory->name.'</td>
                    <td id="stock_'.$inventory->id.'">'.$inventory->stock.'</td>
                    <td><input type="number" min="1" id="quantity_'.$inventory->id.'" name="quantity[]" class=" form-control"   > </td>
                    <td>
                    <select class="typechs form-control item" name="type[]">            
                            <option value="addition" data-id="'.$inventory->id.'">addition</option>
                            <option value="subtraction" data-id="'.$inventory->id.'">subtraction</option>
                    </select> 
                    </td>

                    <td>
                    <select id="sector_'.$inventory->id.'" class="form-control item d-none" name="sector[]">            
                    '.$SectorsOption.'
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
		$branches       = Branches::orderBy('id','desc')->get();
        return view('admin.inventory.create',['branches' => $branches]);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {
            $patients =  Inventory::create([
                'name' => $request->name,
                'stock' => $request->stock,
                'price' => $request->price,
                'expire_date' => $request->expire_date,
                'branch_id' => $request->branch_id,
                'place' => $request->place,
            ]);
            
            $request->session()->flash('success', 'Item created successfully');
            
            return redirect(route('inventory.index'));
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit(Inventory $inventory)
    {
        $branches       = Branches::orderBy('id','desc')->get();
		return view('admin.inventory.create', [
            'item' => $inventory,
            'branches' => $branches,
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
            'branch_id' => $request->branch_id,
            'place' => $request->place,
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

    public function adjustmentCreate(Request $request)
    {
        $inventories       = Inventory::orderBy('id','desc')->get();
        if(count($inventories) == 0)
        {
            $request->session()->flash('success', 'No Items To Adjust');
        
            return redirect(route('index-adjustment'));
        }
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
            

            if($request->type[$i] == "addition")
            {
                $InventoryHistory =  InventoryHistory::create([
                    'inventory_id' => $id,
                    'transaction_id' => $InventoryTransaction->id,
                    'type' => $request->type[$i],
                    'quantity' => $request->quantity[$i],
                ]);
                $inventory = Inventory::find($id);
                $stock = $inventory->stock + $request->quantity[$i];
                $inventory->update([
                    'stock' => $stock,
                ]);
            }elseif($request->type[$i] == "subtraction"){
                $InventoryHistory =  InventoryHistory::create([
                    'inventory_id' => $id,
                    'transaction_id' => $InventoryTransaction->id,
                    'type' => $request->type[$i],
                    'quantity' => $request->quantity[$i],
                    'sector_id' => $request->sector[$i]
                ]);
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



    //-------------- Disable Item  ---------------\\

    public function disableinventory(Request $request)
    {
        $item     = Inventory::where('id', $request->id)->first();

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


    public function active()
    {

		$items       = Inventory::where('disable', 0)->orderBy('id','desc')->get();
		
        return view('admin.inventory.index', [
            'items' => $items,
            'items_count' => count($items),
            'type' => 'active',
        ]);
    }


    //-------------- Get Deactive Branches ---------------\\

    public function deactive()
    {
		$items       = Inventory::where('disable', 1)->orderBy('id','desc')->get();
		
        return view('admin.inventory.index', [
            'items' => $items,
            'items_count' => count($items),
            'type' => 'deactive',
        ]);
    }    
   
}
