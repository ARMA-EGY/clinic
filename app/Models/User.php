<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use App\Models\Todo;
use App\Models\Note;
use App\Models\Event;

use App\Models\Branches;
use App\Models\Sector;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'gender', 'avatar', 'nationality', 'salary', 'branch_id', 'sector_id', 'contract_duration', 'contract_end_date', 'contract_file', 'hiring_date', 'birthdate', 'certificate_file', 'working_hours', 'profit_ratio', 'license_number', 'role', 'disable',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->role == 'Admin';
    }

    public function isEnable()
    {
        return $this->enable == 1;
    }

    public function todo()
    {
        return $this->hasMany(Todo::class);
    }

    public function note()
    {
        return $this->hasMany(Note::class);
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }
    
    public function branch()
    {
        return $this->belongsTo(Branches::class, 'branch_id', 'id');
    }
    
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
