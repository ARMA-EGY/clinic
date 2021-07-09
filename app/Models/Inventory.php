<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Inventory extends Model
{
    protected $table = 'inventory';
    
    protected $fillable = [
        'name','stock','price','expire_date',
    ];

    public function InventoryHistory(){
        return $this->hasMany('App\InventoryHistory','inventory_id');
    }  

}
