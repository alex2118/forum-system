<?php

use App\Forum;
use Faker\Generator as Faker;

$factory->define(Forum::class, function (Faker $faker) {
    return [
        'title' => $faker->words(2, true),
        'description' => $faker->sentence(rand(4, 10), true)
    ];
});
