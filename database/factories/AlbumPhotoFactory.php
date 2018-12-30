<?php

use Faker\Generator as Faker;

$factory->define(App\AlbumPhoto::class, function (Faker $faker) {
    return [
        'memo' => $faker->realText(30),
    ];
});
