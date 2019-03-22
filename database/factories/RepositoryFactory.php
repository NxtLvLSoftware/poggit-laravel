<?php

use App\Models\Repository;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Repository::class, function (Faker $faker) {
    return [
        'owner_id' => function () {
            return factory(User::class)->create()->id;
        },
        'owner_type' => User::class,
        'github_id' => $faker->unique()->randomNumber(),
        'name' => $name = $faker->word,
        'full_name' => $faker->word . '/' . $name,
        'private' => false,
        'fork' => false,
    ];
});
