@extends('layouts.main-layout')

@section('content')
<h1>Lista film completa</h1>

<ul>
    @foreach ($movies as $movie)
    <li>{{$movie -> name}} </li>
    @endforeach
</ul>
@endsection