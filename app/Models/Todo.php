<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Todo extends Model
{
    protected $table = 'todo';
    
    protected $fillable = [
        'user_id','task','done',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
