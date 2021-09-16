<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Appointment extends Model
{
    protected $table = 'appointments';
    
    protected $fillable = ['branch_id', 'sector_id', 'doctor_id', 'patient_id', 'appointment_number', 'appointment_date' , 'notes' , 'status', 'prescription',
    'report_hospital_visit_date', 'report_admission_date', 'report_date_discharge', 'report_sick_leave_period', 'report_diagnosis', 'user_id'];

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


    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'appointment_id', 'id');
    } 

}
