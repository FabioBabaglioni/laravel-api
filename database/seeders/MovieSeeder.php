<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Movie;
use App\Models\Tag;
use App\Models\Genre;


class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie :: factory() -> count(100) -> make() -> each(function($m){
            $genre = Genre :: inRandomOrder() -> first();

            $m -> genre() -> associate($genre);

            $m -> save();

            $tags = Tag :: inrandomOrder() -> limit(rand(1, 4)) -> Get();
            $m -> Tags() -> attach($tags);
        });
    }
}
