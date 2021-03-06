@extends('layouts.main')

@section('content')

<div class="container">
  <div class="row">

    @foreach($books as $book)
    <div class="col-sm-3 my-3">
      <div class="card h-100">
        <img src="{{$book->image_url ?: 'https://via.placeholder.com/640x480.png/0000aa?text=Book'.' '.$book->id }}" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">{{$book->title}}</h5>
          <p class="card-text">{{$book->description}}</p>
          <p class="card-text"><small class="text-muted">Author - {{$book->author}}</small></p>
          <p class="card-text"><small class="text-muted">Released at {{$book->released_at}}</small></p>
          <a href="/books/{{$book->id}}" class="btn btn-secondary">View</a>
          @can('is_librarian')
          <a href="/books/{{$book->id}}/edit" class="btn btn-primary">Edit</a>
          <form action="{{route('books.destroy',['book' => $book->id])}}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-warning my-4">Delete</button>
            </form>
          @endcan
        </div>
      </div>
    </div>
    @endforeach
    


  </div>
</div>

@endsection