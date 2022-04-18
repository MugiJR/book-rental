@extends('layouts.main')
@section('content')


<div class="container primary-content">
    <!-- PRIMARY CONTENT HEADING -->
    <div class="primary-content-heading clearfix">
        <h2>Rental Details</h2>
        <hr style="border:1px solid #fff">
    </div>
    <!-- END PRIMARY CONTENT HEADING -->
    <div class="row">
        <div class="col-md-4">
            <div class="project-section general-info">
                <!-- Book Info Header and View Link -->
                <div class="row">
                    <div class="col-md-8">
                        <h3>Book Info</h3>
                    </div>
                    <div class="col-md-4">
                        <a href="{{route('books.show',['book'=>$borrow->book_id])}}" class="btn btn-sm btn-default float-end"><u class="fa fa-compose text-primary">View Book Details</u></a>
                    </div>
                </div>
                <!-- END -->
                <!-- Book Details -->
                <div class="col-md">
                    <table class="table table-dark table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"> </th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Title</th>
                                <td>{{$borrow->book->title}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Author</th>
                                <td>{{$borrow->book->author}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Date</th>
                                <td>{{$borrow->book->released_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- END Book details -->
            </div>
        </div>
        <div class="col-md-8">
            <div class="project-section general-info">
                <!-- Book Info Header and View Link -->
                <div class="row">
                    <div class="col-md-6">
                        <h3>Rental Info</h3>
                    </div>
                    @if($borrow->deadline<now()) <div class="col-md-4">
                        <label class="btn btn-sm btn-default float-end bg-danger bg-gradient text-white">View Book Details</label>
                </div>
                @endif

            </div>
            <!-- END -->
            <!-- Rental Details -->
            <div class="col-md">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col"> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Name of the borrower</th>
                            <td>{{$borrow->reader->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Date of rental request</th>
                            <td>{{$borrow->created_at}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td><strong>{{$borrow->status}}</strong></td>
                        </tr>
                        @if($borrow->status != 'PENDING')
                        <tr>
                            <th scope="row">Date of procession</th>
                            <td>{{$borrow->request_process_at}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Librarian's name</th>
                            <td>{{$borrow->managedRequests->name}}</td>
                        </tr>

                        @endif
                        @if($borrow->status === 'RETURNED')
                        <tr>
                            <th scope="row">Returned at</th>
                            <td>{{$borrow->returned_at}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Librarian's name</th>
                            <td>{{$borrow->managedRequests->name}}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- END Rental details -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @can('is_librarian')
        <form action="{{route('borrows.update',['borrow'=>$borrow -> id])}}" method="post">
            @csrf
            @method('PUT')

            <div class="col-md-6 py-2">
                <label for="deadline">Deadline</label>
                <input type="date" class="form-control @error('deadline') is-invalid @enderror" value="{{old('deadline',$borrow->deadline)}}" id="deadline" name="deadline">
                @error('deadline')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-6 py-2">

                <label for="status">Status</label>
                <select name="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="" selected disabled>Select Status</option>
                    <option value="PENDING" @selected(old('status',$borrow->status)=='PENDING')>
                        PENDING
                    </option>
                    <option value="REJECTED" @selected(old('status',$borrow->status)=='REJECTED')>
                        REJECTED
                    </option>
                    <option value="ACCEPTED" @selected(old('status',$borrow->status)=='ACCEPTED')>
                        ACCEPTED
                    </option>
                    <option value="RETURNED" @selected(old('status',$borrow->status)=='RETURNED')>
                        RETURNED
                    </option>
                    @error('status')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @endcan
    </div>
</div>
</div>
@endsection