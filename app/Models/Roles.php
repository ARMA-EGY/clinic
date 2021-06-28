<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    
    protected $fillable = ['name', 'guard_name'];

    public function user()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
