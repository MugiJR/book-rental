@extends('layouts.main')

@section('content')

<div class="container py-3">
    <h2>Edit Book</h2>
    <form action="/books/{{$book['id']}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" value="{{ old('title', $book['title']) }}" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Book name">
            @error('title')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" value="{{ old('author', $book['author']) }}" class="form-control @error('author') is-invalid @enderror" id="author" name="author" placeholder="Author name">
            @error('author')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Enter the description" rows="3">{{ old('description', $book['description']) }}</textarea>
            @error('description')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="released_at">Released At</label>
            <input type="date" class="form-control" value="{{ old('released_at', $book['released_at']) }}" class="form-control @error('released_at') is-invalid @enderror" id="released_at" name="released_at" placeholder="Released At">
            @error('released_at')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image_url">Cover Image URL</label>
            <input type="text" class="form-control" value="{{ old('image_url', $book['image_url']) }}" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" placeholder="Enter the Cover Image URL">
            @error('image_url')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="pages">pages</label>
            <input type="number" class="form-control" value="{{ old('pages', $book['pages']) }}" class="form-control @error('pages') is-invalid @enderror" id="pages" name="pages" placeholder="Enter the number of pages">
            @error('pages')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="lang_code">Language Code</label>
            <input type="text" class="form-control" value="{{ old('lang_code', $book['lang_code']) }}" class="form-control @error('lang_code') is-invalid @enderror" id="lang_code" name="lang_code" placeholder="Enter the Language Code">
            @error('lang_code')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" value="{{ old('isbn', $book['isbn']) }}" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn" placeholder="Enter the ISBN">
            @error('isbn')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group d-flex flex-wrap">
            @foreach ($genres as $genre)
            <div class="custom-control custom-switch col-sm-2">
                <input type="checkbox" class="custom-control-input" name="genres[]" id="genre-{{ $genre['id'] }}" value="{{ $genre['id'] }}" @if ($book->genres->contains($genre)) checked @endif
                >
                <label class="custom-control-label" for="genre-{{ $genre['id'] }}">
                    {{ $genre['name'] }}
                </label>
            </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="in_stock">In Stock</label>
            <input type="number" class="form-control" value="{{ old('in_stock', $book['in_stock']) }}" class="form-control @error('in_stock') is-invalid @enderror" id="in_stock" name="in_stock" placeholder="In Stock">
            @error('in_stock')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save book</button>
        </div>

    </form>
</div>

@endsection