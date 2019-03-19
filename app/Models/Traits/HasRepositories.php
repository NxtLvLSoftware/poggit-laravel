<?php

namespace App\Models\Traits;

use App\Models\Repository;

trait HasRepositories
{
    public function repositories()
    {
        return $this->hasMany(Repository::class);
    }
}
