<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $table = 'expenses';
    
    protected $fillable = ['name', 'price', 'category_id', 'branch_id', 'user_id'];
}
