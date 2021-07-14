<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    
    protected $fillable = ['appointment_id', 'patient_id', 'branch_id', 'sub_total', 'tax', 'tax_percentage', 'total', 'payment_method'];

    public function Appointment()
    {
        return $this->belongsTo('App\Models\Appointment','appointment_id');
    } 

    public function Patient()
    {
        return $this->belongsTo('App\Models\Patients','patient_id');
    }   

}
