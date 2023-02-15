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
}
