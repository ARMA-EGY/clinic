<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class appointmentServices extends Model
{
    protected $table = 'appointment_service';
    
    protected $fillable = ['appointment_id', 'service_id', 'body_part', 'status'];

    public function Appointment(){
        return $this->belongsTo('App\Models\Appointment','appointment_id');
    } 

    public function service(){
        return $this->belongsTo('App\Models\Services','service_id');
    }     

}
