<?php

namespace App\Models;
use App\Models\Sector;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class BodyParts extends Model
{
    protected $table = 'body_parts';
    
    protected $fillable = ['name'];

    public function sectors()
    {
        return $this->belongsToMany(Sector::class);
    }

    public function sectorspv()
    {
        return $this->belongsToMany('App\Models\Sector', 'body_parts_sector');
    }

}


