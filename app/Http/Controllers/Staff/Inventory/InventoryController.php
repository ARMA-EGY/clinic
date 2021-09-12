<?php

namespace App\Http\Controllers\Staff\Inventory;

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
        $user              = auth()->user();
        if(!$user->hasPermissionTo('inventory all items'))
        {
            return redirect(route('home'));
        }
		$inventories       = Inventory::where('branch_id', $user->branch_id)->orderBy('id','desc') ->get();

        return view('staff.inventory.index', [
            'items' => $inventories,
            'items_count' => count($inventories),
            'type' => 'all',
        ]);
    }


    //-------------- Get Single Data ---------------\\    

    public function show(Inventory $inventory)
    {
        $user              = auth()->user();
        $branch = Branches::with('sectorspv')->find($inventory->branch_id);

        $SectorsOption = "";
        foreach($branch->sectorspv as $sector)
        {
            $SectorsOption = $SectorsOption . '<option value="'.$sector->id.'">'.$sector->name.'</option>';
        }


        $url = route('staff.show',$inventory->id);
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
        $user                   = auth()->user();
		$transaction            = InventoryTransaction::where('id',$request->id)->first();
        $adjustments            = InventoryHistory::where('transaction_id',$transaction->id)->get();

        return view('staff.modals.show_adjustment',[
            'transaction'    => $transaction,
            'adjustments'    => $adjustments ,
        ]);
    }   

    //-------------- Create New Data ---------------\\

    public function create()
    {
        $user              = auth()->user();
        if(!$user->hasPermissionTo('inventory create items'))
        {
            return redirect(route('home'));
        }
		$branches       = Branches::orderBy('id','desc')->get();
        return view('staff.inventory.create',['branches' => $branches]);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {
            $user              = auth()->user();
            if(!$user->hasPermissionTo('inventory create items'))
            {
                return redirect(route('home'));
            }
            $patients =  Inventory::create([
                'name' => $request->name,
                'stock' => $request->stock,
                'price' => $request->price,
                'expire_date' => $request->expire_date,
                'branch_id' => $request->branch_id,
            ]);
            
            $request->session()->flash('success', 'Item created successfully');
            
            return redirect(route('inventory.index'));
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit($id)
    {
        $inventory = Inventory::find($id);
        $user           = auth()->user();
        if(!$user->hasPermissionTo('inventory edit items'))
        {
            return redirect(route('home'));
        }
        $branches       = Branches::orderBy('id','desc')->get();
		return view('staff.inventory.create', [
            'item' => $inventory,
            'branches' => $branches,
            ]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(UpdateRequest $request, Inventory $inventory)
    {
        $user              = auth()->user();
        if(!$user->hasPermissionTo('inventory edit items'))
        {
            return redirect(route('home'));
        }
        $inventory->update([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'expire_date' => $request->expire_date,
            'branch_id' => $request->branch_id,
        ]);
		
		session()->flash('success', 'Item updated successfully');
		
		return redirect(route('inventory.index'));
    }


    //-------------- Get All Data ---------------\\

    public function adjustmentIndex()
    {
        $user              = auth()->user();
        if(!$user->hasPermissionTo('inventory all adjustment'))
        {
            return redirect(route('home'));
        }
        $transactions       = InventoryTransaction::orderBy('created_at','desc')->get();
        return view('staff.inventory.adjustment.index', [
            'items' => $transactions,
            'items_count' => count($transactions),
        ]);
    }

    public function adjustmentCreate(Request $request)
    {
        $user              = auth()->user();
        if(!$user->hasPermissionTo('all pledge'))
        {
            return redirect(route('home'));
        }
        $inventories       = Inventory::orderBy('id','desc')->get();
        if(count($inventories) == 0)
        {
            $request->session()->flash('success', 'No Items To Adjust');
        
            return redirect(route('staff-index-adjustment'));
        }
        return view('staff.inventory.adjustment.create',[
            'items' => $inventories,
        ]);
    }
    

    
    //-------------- Store New Data ---------------\\

    public function adjustmentStore(Request $request)
    {
        $user              = auth()->user();
        if(!$user->hasPermissionTo('inventory create adjustment'))
        {
            return redirect(route('home'));
        }
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
        $user     = auth()->user();
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

        $user        = auth()->user();
        if(!$user->hasPermissionTo('inventory active items'))
        {
            return redirect(route('home'));
        }
		$items       = Inventory::where('branch_id', $user->branch_id)->where('disable', 0)->orderBy('id','desc')->get();
		
        return view('staff.inventory.index', [
            'items' => $items,
            'items_count' => count($items),
            'type' => 'active',
        ]);
    }


    //-------------- Get Deactive Branches ---------------\\

    public function deactive()
    {
        $user        = auth()->user();
        if(!$user->hasPermissionTo('inventory deactivated items'))
        {
            return redirect(route('home'));
        }
		$items       = Inventory::where('branch_id', $user->branch_id)->where('disable', 1)->orderBy('id','desc')->get();
		
        return view('staff.inventory.index', [
            'items' => $items,
            'items_count' => count($items),
            'type' => 'deactive',
        ]);
    }    
   
}
