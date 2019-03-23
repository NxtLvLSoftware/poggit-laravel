<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepository as Contract;
use App\Models\User;
use Auth;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class UserRepository implements Contract
{
    /**
     * @inheritdoc
     */
    public function current(): ?User
    {
        return Auth::user();
    }

    /**
     * @inheritdoc
     */
    public function find(int $id): ?User
    {
        $user = User::where('id', $id)
            ->first();

        return $user ? $this->loadRelationships($user) : null;
    }

    /**
     * @inheritdoc
     */
    public function findGithub(int $id): ?User
    {
        $user = User::where('github_id', $id)
            ->first();

        return $user ? $this->loadRelationships($user) : null;
    }

    /**
     * Load the relationships for the given user.
     *
     * @param  \App\Models\User $user
     *
     * @return \App\Models\User
     */
    protected function loadRelationships(User $user): User
    {
        return $user->load('repositories')
            ->load('organizations');
    }

    /**
     * @inheritdoc
     */
    public function search(string $query, ?User $excludeUser = null): Collection
    {
        $search = User::newQuery();

        if ($excludeUser) {
            $search->where('id', '<>', $excludeUser->id);
        }

        return $search->where(function (Builder $search) use ($query) {
            $search->where('username', 'like', $query)
                ->orWhere('github_nick', 'like', $query);
        })
            ->get();
    }

    /**
     * @inheritdoc
     */
    public function create(array $data): User
    {
        $user = new User;

        $user->forceFill($data)
            ->save();

        return $user;
    }
}
