<?php

use Faker\Generator as Faker;

$factory->define(App\Album::class, function (Faker $faker) {
    return [
        'spot_id' => rand(1, 50),
        'started_at' => $faker->dateTimeBetween()->format('Y-m-d'),
        'ended_at' => $faker->dateTimeBetween()->format('Y-m-d'),
        'title' => $faker->realText(20),
        'memo' => $faker->realText(80),
    ];
});
