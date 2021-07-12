<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    
    protected $fillable = ['project_name', 'logo', 'favicon', 'contract_alert', 'tax'];
}
