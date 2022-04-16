@extends('layouts.main')

@section('content')

<div class="container py-3">
    <h2>Edit Genre</h2>
    <form action="{{route('genres.update', ['genre' => $genre->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" value="{{ old('name', $genre->name) }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter genre name">
            @error('name')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="style">Style</label>
            <select class="form-control" id="style" name="style">
                <option disabled value="">Choose...</option>

                @if ($genre->style == "primary")
                <option selected value="primary">primary</option>
                @else
                <option value="primary">primary</option>
                @endif

                @if ($genre->style == "secondary")
                <option selected value="secondary">secondary</option>
                @else
                <option value="secondary">secondary</option>
                @endif

                @if ($genre->style == "success")
                <option selected value="success">success</option>
                @else
                <option value="success">success</option>
                @endif

                @if ($genre->style == "danger")
                <option selected value="danger">danger</option>
                @else
                <option value="danger">danger</option>
                @endif

                @if ($genre->style == "warning")
                <option selected value="warning">warning</option>
                @else
                <option value="warning">warning</option>
                @endif

                @if ($genre->style == "info")
                <option selected value="info">info</option>
                @else
                <option value="info">info</option>
                @endif

                @if ($genre->style == "light")
                <option selected value="light">light</option>
                @else
                <option value="light">light</option>
                @endif

                @if ($genre->style == "dark")
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
            <button type="submit" class="btn btn-primary">Save genre</button>
        </div>

    </form>
</div>

@endsection