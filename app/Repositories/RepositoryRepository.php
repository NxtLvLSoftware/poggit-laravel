<?php

namespace App\Repositories;

use App\Contracts\Repositories\RepositoryRepository as Contract;
use App\Models\Repository;
use App\Models\User;
use Illuminate\Support\Collection;

class RepositoryRepository implements Contract
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
    public function find(int $id): ?Repository
    {
        return Repository::where('id', $id)
            ->with('users')
            ->first();
    }

    /**
     * @inheritdoc
     */
    public function findGithub(int $id): ?Repository
    {
        return Repository::where('github_id', $id)
            ->with('users')
            ->first();
    }

    /**
     * @inheritdoc
     */
    public function search(string $query): Collection
    {
        return Repository::where('name', 'like', $query)
            ->get();
    }

    /**
     * @inheritdoc
     */
    public function create($users, array $data): Repository
    {
        $org = Repository::forceCreate($data);

        foreach (is_array($users) ?: [$users] as $user) {
            $user->repositories()
                ->save($org);
        }

        return $org;
    }
}
