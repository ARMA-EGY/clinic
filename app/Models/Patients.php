<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $table = 'patient';
    
    protected $fillable = ['name', 'phone', 'identifiation', 'dateofbirth', 'age', 'gender', 'nationality' , 'job', 'relationship', 'medical_history'];

    public function Appointment(){
        return $this->hasMany('App\Appointment','patient_id');
    }
}
