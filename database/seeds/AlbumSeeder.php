<?php

use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albums = factory(App\Album::class, 3)->create();
        foreach ($albums as $album) {
            factory(App\AlbumPhoto::class, 2)->create([
                'album_id' => $album->id,
                'filename' => 'public/photos/qNVWLIQ3WUybStQVTZf5JeHl4yLdoM2V92hSgqy2.jpeg',
            ]);
        }
    }
}
