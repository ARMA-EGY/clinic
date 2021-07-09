<?php

namespace App\Models;
use App\Models\Sector;

use Illuminate\Database\Eloquent\Model;

class SectorBodyparts extends Model
{
    protected $table = 'body_parts_sector';
    
    protected $fillable = ['sector_id', 'bodypart_id'];


}


