<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $table = 'patient';
    
    protected $fillable = ['name', 'phone', 'identifiation', 'dateofbirth', 'age', 'gender', 'nationality'];
}
