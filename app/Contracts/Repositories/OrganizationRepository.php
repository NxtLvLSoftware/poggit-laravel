<?php

namespace App\Contracts\Repositories;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Collection;

interface OrganizationRepository
{
    /**
     * Get the organizations for an individual user.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Support\Collection
     */
    public function forUser(User $user): Collection;

    /**
     * Get an organization with the corresponding id.
     *
     * @param  int $id
     *
     * @return \App\Models\Organization|null
     */
    public function find(int $id): ?Organization;

    /**
     * Get an organization with the corresponding github id.
     *
     * @param  int $id
     *
     * @return \App\Models\Organization|null
     */
    public function findGithub(int $id): ?Organization;

    /**
     * Perform a basic organization search by name.
     *
     * @param  string $query
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function search(string $query): Collection;

    /**
     * Create a new organization with the given data.
     *
     * @param  \App\Models\User|array  Users
     * @param  array $data
     *
     * @return \App\Models\Organization
     */
    public function create($users, array $data): Organization;
}
