<?php

namespace App\Models\Traits;

use App\Models\Organization;

trait HasOrganizations
{
    public function organizations()
    {
        return $this->belongsToMany(Organization::class, 'organization_users', 'user_id', 'org_id')->withPivot('role');
    }
}
