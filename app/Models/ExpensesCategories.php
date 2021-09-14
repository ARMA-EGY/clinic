<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpensesCategories extends Model
{
    protected $table = 'expenses_category';
    
    protected $fillable = ['name'];
}
