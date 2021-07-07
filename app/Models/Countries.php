<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $table = 'countries';
    
    protected $fillable = ['country_code', 'country_Name', 'country_Nationality'];
}
