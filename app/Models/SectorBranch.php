<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectorBranch extends Model
{
    protected $table = 'branches_sector';
    
    protected $fillable = [
        'sector_id','branches_id',
    ];

}