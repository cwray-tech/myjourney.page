<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Journey;
use Faker\Generator as Faker;

$factory->define(Journey::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'title' => $faker->sentence(4),
        'domain' => $faker->word,
        'picture' => $faker->word,
        'introduction' => $faker->text,
        'published_at' => $faker->dateTime(),
    ];
});
