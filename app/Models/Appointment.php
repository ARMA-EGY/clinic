<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    
    protected $fillable = ['branch_id', 'sector_id', 'doctor_id', 'patient_id'];

}
