<?php

namespace App\Contracts\Repositories;

use App\Models\Repository;
use App\Models\User;
use Illuminate\Support\Collection;

interface RepositoryRepository
{
    /**
     * Get the repositories for an individual user.
     *
     * @param \App\Models\User $user
     *
     * @return mixed
     */
    public function forUser(User $user);

    /**
     * Get a repository with the corresponding id.
     *
     * @param  int $id
     *
     * @return \App\Models\Repository|null
     */
    public function find(int $id): ?Repository;

    /**
     * Get a repository with the corresponding github id.
     *
     * @param  int $id
     *
     * @return \App\Models\Repository|null
     */
    public function findGithub(int $id): ?Repository;

    /**
     * Perform a basic repository search by name or full name.
     *
     * @param  string $query
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function search(string $query): Collection;

    /**
     * Create a new repository with the given data.
     *
     * @param  \App\Models\User|array  Users
     * @param  array $data
     *
     * @return \App\Models\Repository
     */
    public function create($users, array $data): Repository;
}
