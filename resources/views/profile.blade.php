@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <div class="text-center mt-3">
                    <h3 class="mt-2 mb-0"><b>{{auth()->user()->name}}</b></h3>

                   <span>
                        @can('is_librarian')
                        librarian
                        @endcan
                        @cannot('is_librarian')
                        librarian
                        @endcannot
                    </span>
                    <br>
                    <span>{{auth()->user()->email}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection