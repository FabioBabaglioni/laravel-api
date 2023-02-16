@extends('layouts.main-layout')

@section('content')
<h2 class="text-center py-3">Crea nuovo film</h2>

<a href="{{route('movie.home')}}" class="d-flex justify-content-center m-3">
    <div class="btn btn-danger">Indietro</div>
</a>

<form class="row g-3 d-flex justify-content-center" method="POST" action="{{route('movie.update', $movie)}}">

    @csrf

    <div class="col-md-7">
        <label for="name" class="form-label fs-5">Nome film</label>
        <input type="text" class="form-control" name="name" value="{{$movie -> name}}">
    </div>

    <div class="col-md-7">
        <label for="year" class="form-label fs-5">Anno di uscita</label>
        <input type="date" name="year" class="form-control" value="{{$movie -> year}}">
    </div>

    <div class="col-7">
        <label for="cashOut" class="form-label fs-5">Incassi</label>
        <input type="number" class="form-control" name="cashOut" value="{{$movie -> cashOut}}">
    </div>

    <div class="col-7">
        <label for="genre_id" id="genre_id" class="form-label fs-5">Genere</label>
        <select name="genre_id">
            @foreach ($genres as $genre)
            <option value="{{$genre -> id}}" @selected($movie -> genre -> id == $genre -> id)>{{$genre -> name}}
            </option>
            @endforeach
        </select>
    </div>

    <div class="col-7">
        <h5>tag</h5>
        <div class="check">
            @foreach ($tags as $tag)
            <input type="checkbox" name="tags_id[]" value="{{ $tag -> id }}" id="{{ $tag -> id }}" @foreach ($movie ->
            tags as $movieT)
            @checked ($movieT -> id == $tag -> id)
            @endforeach
            >
            <label for="{{ $tag -> id }}">{{ $tag -> name }}</label>
            <br>
            @endforeach
        </div>
    </div>

    <div class="col-7">
        <button type="submit" class="btn btn-outline-success fs-5">Aggiorna Film</button>
    </div>
</form>
@endsection