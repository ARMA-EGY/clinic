<?php

namespace App\Models;
use App\Models\Sector;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $table = 'expenses';
    
    protected $fillable = ['name', 'price', 'category_id'];

    public function category(){
        return $this->belongsTo('App\Models\ExpensesCategories','category_id');
    }
}
