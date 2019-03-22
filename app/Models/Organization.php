<?php

namespace App\Models;

use App\Models\Traits\HasRepositories;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasRepositories;

    public function users()
    {
        return $this->belongsToMany(User::class, 'organization_users', 'organization_id', 'user_id')->withPivot('role');
    }
}
