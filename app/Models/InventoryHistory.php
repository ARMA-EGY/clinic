<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class InventoryHistory extends Model
{
    protected $table = 'inventory_history';
    
    protected $fillable = [
        'inventory_id','type','quantity','transaction_id'
    ];

    public function InventoryTransaction(){
        return $this->belongsTo('App\Models\InventoryTransaction','transaction_id');
    } 

    public function Inventory(){
        return $this->belongsTo('App\Models\Inventory','inventory_id');
    } 

}
