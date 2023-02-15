@extends('layouts.main-layout')

@section('content')
<h1 class="text-center py-3">Lista film completa</h1>

<a href="" class="d-flex justify-content-center mb-3">
    <div class="btn btn-primary">Aggiungi nuovo film</div>
</a>


<ul>
    @foreach ($movies as $movie)
    <li>{{$movie -> name}}
        <a href="">Edit</a>
        <a href="{{route('movie.delete', $movie)}}">Delete</a>

    </li>
    @endforeach
</ul>
@endsection