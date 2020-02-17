<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'author' => $faker->name,
        'category' => $faker->company
    ];
});
