<?php

use Faker\Generator as Faker;

$factory->define(App\Album::class, function (Faker $faker) {
    return [
        'spot_id' => rand(1, 50),
        'started_at' => $faker->dateTimeBetween(),
        'ended_at' => $faker->dateTimeBetween(),
        'title' => $faker->sentence(),
        'memo' => $faker->paragraph(),
    ];
});
