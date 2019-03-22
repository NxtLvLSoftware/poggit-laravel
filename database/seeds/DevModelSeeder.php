<?php

use App\Models\Organization;
use App\Models\Repository;
use App\Models\User;
use Illuminate\Database\Seeder;

class DevModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)
            ->create()
            ->each(function (User $user) {
                factory(Repository::class, 5)->create([
                    'owner_id' => $user->id,
                    'owner_type' => User::class,
                ])->each(function (Repository $repo) use($user) {
                    $user->repositories()->save($repo);
                });

                factory(Organization::class, 2)->create()->each(function (Organization $org) use($user) {
                    $user->organizations()->save($org);
                    factory(Repository::class, 2)->create([
                        'owner_id' => $org->id,
                        'owner_type' => Organization::class,
                    ])->each(function (Repository $repo) use($org) {
                        $repo->owner()->save($org);
                    });
                });
            });
    }
}
