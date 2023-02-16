@extends('layouts.main-layout')

@section('content')
<h2 class="text-center py-3">Crea nuovo film</h2>

<form class="row g-3 d-flex justify-content-center" method="POST" action="{{route('movie.store')}}">
    @csrf
    <div class="col-md-7">
        <label for="name" class="form-label fs-5">Nome film</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="col-md-7">
        <label for="year" class="form-label fs-5">Anno di uscita</label>
        <input type="date" name="year" class="form-control">
    </div>
    <div class="col-7">
        <label for="cashOut" class="form-label fs-5">Incassi</label>
        <input type="number" class="form-control" name="cashOut">
    </div>
    <div class="col-7">
        <label for="genre_id" class="form-label fs-5">Genere</label>
        <select name="genre_id">
            @foreach ($genres as $genre)
            <option value="{{$genre -> id}}">{{$genre -> name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-7">
        <h5>tag</h5>
        <div class="check">
            @foreach ($tags as $tag)
            <input type="checkbox" name="tags" value="{{$tag -> id}}">
            <label for="tags">{{$tag -> name}}</label>
            <br>
            @endforeach
        </div>
    </div>

    <div class="col-7">
        <button type="submit" class="btn btn-outline-success fs-5">Aggiungi Film</button>
    </div>
</form>
@endsection