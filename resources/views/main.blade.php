@extends('layouts.main')

@section('content')
<div class="container">
  <ol class="list-group list-group-numbered">
    <li class="list-group-item d-flex justify-content-between align-items-start">
      <div class="ms-2 me-auto">
        <div class="fw-bold">No. of Books</div>
        Content for list item
      </div>
      <span class="badge bg-primary rounded-pill">{{$numberOfBooks}}</span>
    </li>
  </ol>
</div>
@endsection