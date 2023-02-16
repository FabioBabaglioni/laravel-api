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

        $movies = movie :: orderBy('created_at', 'DESC') -> get();
        
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
        'year' => 'required|date',
        'cashOut' => 'required|min:0|max:10000000',
        'genre_id' => 'required|integer',
        'tags' => 'required',
        ]);

        $movie = movie :: make($data);
        $genre = genre :: find($data['genre_id']);

        $movie -> genre() -> associate($genre);
        $movie -> save();

        $tags = tag :: find($data['tags']);
        $movie -> tags() -> attach($tags);

        return redirect() -> route('movie.home');
    }

    public function movieEdit(movie $movie){

        $tags = tag :: all();
        $genres = genre :: all();
        
        return view('pages.movieEdit', compact('movie', 'tags', 'genres'));
    }

    public function movieUpdate(Request $request, movie $movie){
         
        $data = $request -> validate([
        'name' => 'required|string|max:64',
        'year' => 'required|date',
        'cashOut' => 'required|min:0|max:10000000',
        'genre_id' => 'required|integer',
        'tags_id' => 'required',
        ]);

        $movie -> update($data);

        $genre = genre :: find($data['genre_id']);

        $movie -> genre() -> associate($genre);

        $movie -> save();

        $tags = tag :: find($data['tags_id']);
        $movie -> tags() -> attach($tags);

        return redirect() -> route('movie.home');
    }
}
