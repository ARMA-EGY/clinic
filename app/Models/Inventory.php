<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Inventory extends Model
{
    protected $table = 'inventory';
    
    protected $fillable = [
        'name','stock','price','expire_date','branch_id', 'place', 'disable'
    ];

    public function InventoryHistory(){
        return $this->hasMany('App\InventoryHistory','inventory_id');
    }  

    public function branch(){
        return $this->belongsTo('App\Models\Branches','branch_id');
    }

}
