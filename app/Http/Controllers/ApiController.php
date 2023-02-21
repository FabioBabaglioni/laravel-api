<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class ApiController extends Controller
{
    public function test(){
        return response() -> json([
            'data' => 'test'
        ]);
    }

    public function movieHome(){
        $movies = Movie :: all();
        return response() -> json([
            'succes' => 'true',
            'response' => $movies,
        ]);
    }
}
