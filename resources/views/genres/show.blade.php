<!-- Page Content -->
@extends('layouts.main')

@section('content')
<div class="container">

    <!-- Genre Heading -->
    <h1 class="my-4">{{$genre -> name}}
    </h1>

    <!-- Related Books Row -->
    <h3 class="my-4">Related Books</h3>
    @php
    $rowNo = 1;
    @endphp
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book Title</th>
                <th scope="col">Author</th>
                <th scope="col">Date</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <th scope="row">{{$rowNo++}}</th>
                <td>
                    <a href="{{route('books.show',['book' => $book -> id])}}">{{$book -> title}}</a>
                </td>
                <td>{{$book -> author}}</td>
                <td>{{$book -> released_at}}</td>
                <td>{{$book -> description}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>
<!-- /.container -->
@endsection