<!-- Page Content -->
@extends('layouts.main')

@section('content')
<div class="container">

    <!-- Portfolio Item Heading -->
    <h1 class="my-4">{{$book -> title}}
    </h1>

    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-8">
            <img class="img-fluid" src="{{$book->image_url ?: 'https://via.placeholder.com/640x480.png/0000aa?text=Book'.' '.$book->id }}" alt="{{$book -> title}}">
        </div>

        <div class="col-md-4">
            <h3 class="my-3">Book Description</h3>
            <p>
                {{$book -> description }}
            </p>
            <h3 class="my-3">Book Details</h3>
            <div class="table-responsive">
                <table class="table table-striped table-product">
                    <tbody>
                        <tr>
                            <td width="190">Author</td>
                            <td>{{$book -> author }}</td>
                        </tr>
                        <tr>
                            <td>Released at</td>
                            <td>{{$book -> released_at }}</td>
                        </tr>
                        <tr>
                            <td>No. of pages</td>
                            <td>{{$book -> pages }}</td>
                        </tr>
                        <tr>
                            <td>Language Code</td>
                            <td>{{$book -> lang_code }}</td>
                        </tr>
                        <tr>
                            <td>ISBN</td>
                            <td>{{$book -> isbn }}</td>
                        </tr>
                        <tr>
                            <td>In Stock</td>
                            <td>{{$book -> in_stock }}</td>
                        </tr>
                        <tr>
                            <td>No of Available Book</td>
                            <td>{{ $book->in_stock - $book->activeBorrows()->count()}}</td>
                        </tr>
                        <tr>
                            <td>Genres</td>
                            <td>
                                @foreach($book->genres as $genre)
                                <ul class="list-group">
                                    <li class="list-group-item">{{$genre -> name}}</li>
                                </ul>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @if(Auth::check())
            @cannot('is_librarian')
            @if($book->ongoingBorrows->isNotEmpty())
            <h3 class="my-3">You have already an ongoing rental request for this book.</h3>
            @else
            <form action="{{route('borrows.store', ['book' => $book -> id] )}}" method="post">
                @csrf
                <button type="submit" class="btn btn-warning my-4">Borrow this book</button>
            </form>
            @endif
            @endcannot
            @can('is_librarian')
            <a href="{{route('books.edit',['book' => $book->id])}}" class="btn btn-primary">Edit</a>
            <form action="{{route('books.destroy',['book' => $book->id])}}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-warning my-4">Delete</button>
            </form>
            @endcan
            @endif
        </div>
    </div>
</div>
<!-- /.container -->
@endsection