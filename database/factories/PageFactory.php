<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'seo_meta_description' => $faker->text,
        'seo_meta_title' => $faker->word,
        'content' => $faker->paragraphs(3, true),
        'slug' => $faker->slug,
        'image' => $faker->word,
    ];
});
