@extends('layouts.main')

@section('content')

<div class="container">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Rental requests with PENDING status
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Book Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Date of rental</th>
                                <th scope="col">Deadline</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendingRentals as $rental)
                            <tr>
                                <td>
                                    <a href="{{route('borrows.show',['borrow' => $rental -> id])}}">{{$rental -> book -> title}}</a>
                                </td>
                                <td>{{$rental -> book -> author}}</td>
                                <td>{{$rental -> request_process_at}}</td>
                                <td>{{$rental -> deadline}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Accepted and in-time rentals (before the deadline)
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Book Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Date of rental</th>
                                <th scope="col">Deadline</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inTimeAcceptedRentals as $rental)
                            <tr>
                                <td>
                                    <a href="{{route('books.show',['book' => $rental -> book_id])}}">{{$rental -> book -> title}}</a>
                                </td>
                                <td>{{$rental -> book -> author}}</td>
                                <td>{{$rental -> request_process_at}}</td>
                                <td>{{$rental -> deadline}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Accepted late rentals (after the deadline)
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Book Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Date of rental</th>
                                <th scope="col">Deadline</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lateRentals as $rental)
                            <tr>
                                <td>
                                    <a href="{{route('books.show',['book' => $rental -> book_id])}}">{{$rental -> book -> title}}</a>
                                </td>
                                <td>{{$rental -> book -> author}}</td>
                                <td>{{$rental -> request_process_at}}</td>
                                <td>{{$rental -> deadline}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Rejected rental requests
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Book Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Date of rental</th>
                                <th scope="col">Deadline</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rejectedRentals as $rental)
                            <tr>
                                <td>
                                    <a href="{{route('books.show',['book' => $rental -> book_id])}}">{{$rental -> book -> title}}</a>
                                </td>
                                <td>{{$rental -> book -> author}}</td>
                                <td>{{$rental -> request_process_at}}</td>
                                <td>{{$rental -> deadline}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Returned rentals
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Book Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Date of rental</th>
                                <th scope="col">Deadline</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($returnedRentals as $rental)
                            <tr>
                                <td>
                                    <a href="{{route('books.show',['book' => $rental -> book_id])}}">{{$rental -> book -> title}}</a>
                                </td>
                                <td>{{$rental -> book -> author}}</td>
                                <td>{{$rental -> request_process_at}}</td>
                                <td>{{$rental -> deadline}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection