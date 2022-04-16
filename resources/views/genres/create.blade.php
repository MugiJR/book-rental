@extends('layouts.main')

@section('content')

<div class="container py-3">
    <h2>Add New Genre</h2>
    <form action="{{route('genres.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" value="{{ old('name', '') }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter genre name">
            @error('name')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="style">Style</label>
            <select class="form-control" id="style" name="style">
                <option selected disabled value="">Choose...</option>
                
                @if (old('style', '') == "primary")
                <option selected value="primary">primary</option>
                @else
                <option value="primary">primary</option>
                @endif

                @if (old('style', '') == "secondary")
                <option selected value="secondary">secondary</option>
                @else
                <option value="secondary">secondary</option>
                @endif

                @if (old('style', '') == "success")
                <option selected value="success">success</option>
                @else
                <option value="success">success</option>
                @endif

                @if (old('style', '') == "danger")
                <option selected value="danger">danger</option>
                @else
                <option value="danger">danger</option>
                @endif

                @if (old('style', '') == "warning")
                <option selected value="warning">warning</option>
                @else
                <option value="warning">warning</option>
                @endif

                @if (old('style', '') == "info")
                <option selected value="info">info</option>
                @else
                <option value="info">info</option>
                @endif

                @if (old('style', '') == "light")
                <option selected value="light">light</option>
                @else
                <option value="light">light</option>
                @endif

                @if (old('style', '') == "dark")
                <option selected value="dark">dark</option>
                @else
                <option value="dark">dark</option>
                @endif
            </select>
            @error('style')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add new genre</button>
        </div>

    </form>
</div>

@endsection