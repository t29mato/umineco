<?php

use Faker\Generator as Faker;

$factory->define(App\AlbumPhoto::class, function (Faker $faker) {
    return [
        // 'album_id' => $album->id,
        // 'filename' => 'public/photos/qNVWLIQ3WUybStQVTZf5JeHl4yLdoM2V92hSgqy2.jpeg',
        'memo' => $faker->sentence(),
    ];
});
