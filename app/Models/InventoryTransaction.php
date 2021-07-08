<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class InventoryTransaction extends Model
{
    protected $table = 'inventory_transaction';
    
    protected $fillable = [
        'notes','items_num'
    ];

    public function InventoryHistory(){
        return $this->hasMany('App\InventoryHistory','transaction_id');
    }    


}
