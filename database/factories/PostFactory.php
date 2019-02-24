<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'name' => $faker->text,
        'text' => $faker->realText(2000),
    ];
});
