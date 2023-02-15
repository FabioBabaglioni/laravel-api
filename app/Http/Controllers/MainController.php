<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Genre;
use App\Models\Tag;
use App\Models\Movie;

class MainController extends Controller
{
    public function home(){

        $genres = genre :: all();
        
        return view('pages.home', compact('genres'));
    }

    public function movieHome(){

        $movies = movie :: all();
        
        return view('pages.movieHome', compact('movies'));
    }

     public function movieDelete(Movie $movie){

        $movie -> tags() -> sync([]);
        $movie -> delete();

        return redirect() -> route('movie.home');
    }

    public function movieCreate(){

        $tags = tag :: all();
        $genres = genre :: all();

        return view('pages.movieCreate', compact('tags', 'genres'));
    }

    public function movieStore(Request $request){
         
        $data = $request -> validate([
        'name' => 'required|string|max:64',
        'year' => 'required|date|before:tomorow',
        'cashOut' => 'required|min:0|max:10000000',
        'tags_id' => 'required',
        'genres' => 'required',
        ]);

        $movie = movie :: make($data);
        $tag = tag :: find($data['tags_id']);

        $movie -> tag() -> associate($tag);
        $movie -> save();

        $genres = genre :: find($data['genres']);
        $movie -> genres() -> attach($genres);

        return redirect() -> route('movie.home');
    }
}
