<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorExpenses extends Model
{
    protected $table = 'doctor_expenses';
    
    protected $fillable = ['doctor_id', 'expense_id', 'price'];
}
