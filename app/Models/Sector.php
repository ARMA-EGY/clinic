<?php

namespace App\Models;
use App\Models\Branches;
use App\Models\Services;
use App\Models\BodyParts;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sector';
    
    protected $fillable = ['name', 'image', 'description', 'disable'];

    public function branches()
    {
        return $this->belongsToMany(Branches::class);
    }

    public function services()
    {
        return $this->belongsToMany(Services::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function bodyparts()
    {
        return $this->belongsToMany(BodyParts::class);
    }
    
    public function hasBodyparts($bodypart_id)
    {
        $bodyparts = $this->bodyparts->pluck('id')->toArray();
        return in_array($bodypart_id, $bodyparts);
    }

    public function branchespv()
    {
        return $this->belongsToMany('App\Models\Branches', 'branches_sector');
    }

    public function bodypartspv()
    {
        return $this->belongsToMany('App\Models\BodyParts', 'body_parts_sector','sector_id', 'body_parts_id');
    }
}
