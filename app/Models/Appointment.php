<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    
    protected $fillable = ['branch_id', 'sector_id', 'doctor_id', 'patient_id', 'appointment_number', 'appointment_date'];

    public function patient(){
        return $this->belongsTo('App\Models\Patients','patient_id');
    } 

    public function doctor(){
        return $this->belongsTo('App\Models\User','doctor_id');
    }     

    public function sector(){
        return $this->belongsTo('App\Models\Sector','sector_id');
    } 

    public function branch(){
        return $this->belongsTo('App\Models\Branches','branch_id');
    } 

    public function AppointmentServices()
    {
        return $this->belongsTo('App\Models\appointmentServices','appointment_id');
    } 

}
