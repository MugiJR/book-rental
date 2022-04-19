@extends('layouts.main')

@section('content')
<div class="container">
  <ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">
      Number of Users
      <span class="badge bg-primary rounded-pill">{{$numberOfUsers}}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      Number of Genres
      <span class="badge bg-primary rounded-pill">{{$numberOfGenres}}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      Number of Books
      <span class="badge bg-primary rounded-pill">{{$numberOfBooks}}</span>
    </li>
    @if(Auth::check())
    <li class="list-group-item d-flex justify-content-between align-items-center">
      Number of Active Book Rentals
      <span class="badge bg-primary rounded-pill">{{$numberOfActiveBookRentals}}</span>
    </li>
    @endif
  </ul>
  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          List of Genres
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <ol class="list-group list-group-numbered">
            @foreach($genreList as $genre)
            <li class="list-group-item">
              <a href="{{route('genres.show', ['genre' => $genre -> id])}}" >{{$genre->name}}</a>
            </li>
            @endforeach
          </ol>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection