<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Step;
use Faker\Generator as Faker;

$factory->define(Step::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'user_id' => factory(\App\User::class),
        'journey_id' => factory(\App\Journey::class),
        'published_at' => $faker->dateTime(),
        'description' => $faker->text,
        'date' => $faker->dateTime(),
        'picture' => $faker->word,
    ];
});
