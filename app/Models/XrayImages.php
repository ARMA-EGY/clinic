<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Xrays;

class XrayImages extends Model
{
    protected $table = 'xray_images';
    
    protected $fillable = [
        'xray_id', 'image',
    ];

    public function xray()
    {
        return $this->belongsTo(Xrays::class, 'xray_id');
    }
}