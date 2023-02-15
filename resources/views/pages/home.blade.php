@extends('layouts.main-layout')

@section('content')

<h1 class="text-center py-3">All Movie</h1>

@foreach ($genres as $genre)
<h2>{{$genre -> name}}</h2>
<ul>
    @foreach ($genre -> movies as $movie)
    <li>{{$movie -> name}}</li>
    @endforeach
</ul>
@endforeach



@endsection