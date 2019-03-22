<?php

namespace App\Models\Traits;

use App\Models\Repository;

trait HasRepositories
{
    public function repositories()
    {
        return $this->belongsToMany(Repository::class, 'repository_users', 'user_id', 'repo_id')->withPivot('role');
    }
}
