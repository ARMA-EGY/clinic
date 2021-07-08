<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event extends Model
{
    protected $table = 'inventory';
    
    protected $fillable = [
        'user_id','title','description','class_name','start_date','end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
