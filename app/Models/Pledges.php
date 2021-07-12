<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PledgeFile;

class Pledges extends Model
{
    protected $table = 'pledges';
    
    protected $fillable = ['patient_id', 'file_id', 'signature', 'status'];

    public function patient()
    {
        return $this->belongsTo('App\Models\Patients','patient_id');
    } 

    public function file()
    {
        return $this->belongsTo(PledgeFile::class,'file_id');
    }
}
