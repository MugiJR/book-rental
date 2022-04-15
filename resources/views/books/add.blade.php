@extends('layouts.main')

@section('content')

<div class="container py-3">
    <h2>Add New Book</h2>
    <form action="/books" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" value="{{ old('title', '') }}" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Book name">
            @error('title')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" value="{{ old('author', '') }}" class="form-control @error('author') is-invalid @enderror" id="author" name="author" placeholder="Author name">
            @error('author')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" value="{{ old('description', '') }}" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Enter the description" rows="3"></textarea>
            @error('description')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="released_at">Released At</label>
            <input type="date" class="form-control" value="{{ old('released_at', '') }}" class="form-control @error('released_at') is-invalid @enderror" id="released_at" name="released_at" placeholder="Released At">
            @error('released_at')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image_url">Cover Image URL</label>
            <input type="text" class="form-control" value="{{ old('image_url', '') }}" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" placeholder="Enter the Cover Image URL">
            @error('image_url')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="pages">pages</label>
            <input type="number" class="form-control" value="{{ old('pages', '') }}" class="form-control @error('pages') is-invalid @enderror" id="pages" name="pages" placeholder="Enter the number of pages">
            @error('pages')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="lang_code">Language Code</label>
            <input type="text" class="form-control" value="{{ old('lang_code', 'hu') }}" class="form-control @error('lang_code') is-invalid @enderror" id="lang_code" name="lang_code" placeholder="Enter the Language Code">
            @error('lang_code')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" value="{{ old('isbn', '') }}" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn" placeholder="Enter the ISBN">
            @error('isbn')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="in_stock">In Stock</label>
            <input type="number" class="form-control" value="{{ old('in_stock', '') }}" class="form-control @error('in_stock') is-invalid @enderror" id="in_stock" name="in_stock" placeholder="In Stock">
            @error('in_stock')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add new book</button>
        </div>

    </form>
</div>

@endsection