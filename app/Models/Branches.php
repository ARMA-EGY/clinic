<?php

namespace App\Models;
use App\Models\Sector;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    protected $table = 'branches';
    
    protected $fillable = ['name', 'phone', 'city', 'address', 'disable'];

    public function sectors()
    {
        return $this->belongsToMany(Sector::class);
    }
    
    public function hasSector($sectorID)
    {
        $sectors = $this->sectors->pluck('id')->toArray();
        return in_array($sectorID, $sectors);
    }

    public function user()
    {
        return $this->hasMany(User::class, 'branch_id', 'id');
    }

    public function doctor()
    {
        return $this->hasMany(User::class, 'branch_id', 'id')->where('role', 'Doctor')->where('disable',0);
    }

    public function inventory(){
        return $this->hasMany('App\Inventory','branch_id');
    }
    
    public function sectorspv()
    {
        return $this->belongsToMany('App\Models\Sector', 'branches_sector','branches_id', 'sector_id');
    }
}


