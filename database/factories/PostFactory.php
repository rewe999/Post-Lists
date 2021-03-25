<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => 345345,
        'desc' => $faker->text,
        'user_id' => $faker->numberBetween(1,11),
    ];
});
