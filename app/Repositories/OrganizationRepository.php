<?php

namespace App\Repositories;

use App\Contracts\Repositories\OrganizationRepository as Contract;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Collection;
use function is_array;

class OrganizationRepository implements Contract
{
    /**
     * @inheritdoc
     */
    public function forUser(User $user): Collection
    {
        return $user->organizations()
            ->get();
    }

    /**
     * @inheritdoc
     */
    public function find(int $id): ?Organization
    {
        return Organization::where('id', $id)
            ->with('users')
            ->first();
    }

    /**
     * @inheritdoc
     */
    public function findGithub(int $id): ?Organization
    {
        return Organization::where('github_id', $id)
            ->with('users')
            ->first();
    }

    /**
     * @inheritdoc
     */
    public function search(string $query): Collection
    {
        return Organization::where('name', 'like', $query)
            ->get();
    }

    /**
     * @inheritdoc
     */
    public function create($users, array $data): Organization
    {
        $org = Organization::forceCreate($data);

        foreach (is_array($users) ?: [$users] as $user) {
            $user->organizations()
                ->save($org);
        }

        return $org;
    }
}
