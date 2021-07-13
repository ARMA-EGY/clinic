<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\XrayImages;

class Xrays extends Model
{
    protected $table = 'xrays';
    
    protected $fillable = ['name', 'appointment_id', 'patient_id', 'sector_id'];

    public function images()
    {
        return $this->hasMany(XrayImages::class, 'xray_id');
    }

    public function patient()
    {
        return $this->belongsTo('App\Models\Patients','patient_id');
    } 
}
