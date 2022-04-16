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
                <option value="primary" @selected(old('style')=="primary" )>
                    primary
                </option>

                <option value="secondary" @selected(old('style')=="secondary" )>
                secondary
                </option>

                <option value="success" @selected(old('style')=="success" )>
                success
                </option>

                <option value="danger" @selected(old('style')=="danger" )>
                danger
                </option>

                <option value="warning" @selected(old('style')=="warning" )>
                warning
                </option>

                <option value="info" @selected(old('style')=="info" )>
                info
                </option>

                <option value="light" @selected(old('light')=="light" )>
                light
                </option>

                <option value="dark" @selected(old('dark')=="dark" )>
                dark
                </option>
                
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