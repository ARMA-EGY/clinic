<?php

namespace App\Models;
use App\Models\Branches;
use App\Models\Services;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sector';
    
    protected $fillable = ['name', 'disable'];

    public function branches()
    {
        return $this->belongsToMany(Branches::class);
    }

    public function services()
    {
        return $this->belongsToMany(Services::class);
    }
}
