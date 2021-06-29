<?php

namespace App\Models;
use App\Models\Sector;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';
    
    protected $fillable = ['name', 'number', 'price', 'sector_id', 'category_id','disable'];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
