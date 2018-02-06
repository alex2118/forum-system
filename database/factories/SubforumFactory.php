<?php

use App\Subforum;
use Faker\Generator as Faker;

$factory->define(Subforum::class, function (Faker $faker) {
    return [
      'forum_id' => rand(1, 8),
      'title' => $faker->words(2, true),
      'description' => $faker->sentence(rand(4, 10), true)
    ];
});
