<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Link;
use Faker\Generator as Faker;

$factory->define(Link::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\Models\User::class),
        'link' => $faker->url,
        'local_link' => $faker->url,
    ];
});
