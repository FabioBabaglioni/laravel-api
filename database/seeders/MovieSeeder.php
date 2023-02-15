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
        Movie :: factory() -> count(100) -> make() -> each(function($p){
            $genre = Genre :: inRandomOrder() -> first();

            $p -> Genre() -> associate($genre);

            $p -> save();

            $tags = Tag :: inrandomOrder() -> limit(rand(1, 4)) -> Get();
            $p -> Tags() -> attach($tags);
        });
    }
}
