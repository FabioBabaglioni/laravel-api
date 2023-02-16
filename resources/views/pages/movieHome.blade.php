@extends('layouts.main-layout')

@section('content')
<h1 class="text-center py-3">Lista film completa</h1>

<div class="d-flex justify-content-center">
    <a href="{{route('movie.create')}}" class="d-flex justify-content-center m-3">
        <div class="btn btn-primary">Aggiungi nuovo film</div>
    </a>
    <a href="{{route('home')}}" class="d-flex justify-content-center m-3">
        <div class="btn btn-danger">Indietro</div>
    </a>
</div>



<ul>
    @foreach ($movies as $movie)
    <li>{{$movie -> name}}
        <a href="{{route('movie.edit', $movie)}}">Edit</a>
        <a href="{{route('movie.delete', $movie)}}">Delete</a>
    </li>
    @endforeach
</ul>
@endsection