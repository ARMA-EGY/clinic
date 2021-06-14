<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Note extends Model
{
    protected $table = 'notes';
    
    protected $fillable = [
        'user_id','title','text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
