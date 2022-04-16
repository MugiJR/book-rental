@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col my-3">
            <a href="{{route('genres.create')}}" class="btn btn-primary">Add New Genre</a>
        </div>
    </div>
    <div class="row">
        @foreach($genres as $genre)
        <div class="col-sm-3 my-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$genre -> name}}</h3>
                    <p class="card-text text-{{$genre -> style}}">{{$genre -> style}}</p>
                    <a href="{{route('genres.edit', ['genre' => $genre->id])}}" class="btn btn-info btn-sm">Edit</a>
                    <form action="{{route('genres.destroy', ['genre' => $genre->id])}}" method="post" style="display: inline;">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-warning btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection