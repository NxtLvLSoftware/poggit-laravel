<?php

use App\Models\Organization;
use Faker\Generator as Faker;

$factory->define(Organization::class, function (Faker $faker) {
    return [
        'github_id' => $faker->unique()->randomNumber(),
        'name' => $faker->word,
    ];
});
