<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pledges;

class PledgeFile extends Model
{
    protected $table = 'pledge_file';
    
    protected $fillable = [
        'name', 'filename',
    ];

    public function pledges()
    {
        return $this->hasMany(Pledges::class,'file_id');
    }

}