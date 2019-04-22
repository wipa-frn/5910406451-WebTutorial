<?php

use Faker\Generator as Faker;
use App\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(100),   //make real word
        'detail' => $faker->realText(200)
    ];

    // https://github.com/fzaninotto/Faker
});
