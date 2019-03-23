<?php

namespace App\Contracts\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepository
{
    /**
     * Get the applications currently signed in user.
     *
     * @return \App\Models\User|null
     */
    public function current(): ?User;

    /**
     * Get a user with the corresponding id.
     *
     * @param  int $id
     *
     * @return \App\Models\User|null
     */
    public function find(int $id): ?User;

    /**
     * Get a user with the corresponding github id.
     *
     * @param  int $id
     *
     * @return \App\Models\User|null
     */
    public function findGithub(int $id): ?User;

    /**
     * Perform a basic user search by name or e-mail address.
     *
     * @param  string                $query
     * @param  \App\Models\User|null $excludeUser
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function search(string $query, ?User $excludeUser = null): Collection;

    /**
     * Create a new user with the given data.
     *
     * @param  array $data
     *
     * @return \App\Models\User
     */
    public function create(array $data): User;
}
