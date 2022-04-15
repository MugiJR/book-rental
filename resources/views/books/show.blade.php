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
            <p>{{$book -> description }}</p>
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
                    </tbody>
                </table>
            </div>
            <form action="/books/{{$book->id}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-warning my-4">Delete</button>
            </form>
            
        </div>
        

    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <!-- <h3 class="my-4">Related Projects</h3>

    <div class="row">

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="#">
                <img class="img-fluid" src="https://via.placeholder.com/500x300" alt="">
            </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="#">
                <img class="img-fluid" src="https://via.placeholder.com/500x300" alt="">
            </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="#">
                <img class="img-fluid" src="https://via.placeholder.com/500x300" alt="">
            </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="#">
                <img class="img-fluid" src="https://via.placeholder.com/500x300" alt="">
            </a>
        </div>

    </div>
    /.row -->

</div>
<!-- /.container -->
@endsection