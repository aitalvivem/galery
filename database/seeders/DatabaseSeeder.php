<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallerie;
use App\Models\Photo;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        

        Gallerie::factory()->count(10)->create();

        Tag::factory()->count(10)->create();

        $ids = range(1, 10);

        Photo::factory()->count(40)->create()->each(function ($photo) use($ids) {
            shuffle($ids);
            $photo->tags()->attach(array_slice($ids, 0, rand(1, 4)));
        });
    }
}
