<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookFormRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function main()
    {
        $numberOfBooks = Book::all()->count();
        return view('main', ['numberOfBooks' => $numberOfBooks]);
    }
    public function index()
    {
        $books = Book::all();
        return view('books.list', ['books' => $books]);
    }

    public function create()
    {
        return view('books.add');
    }

    public function store(BookFormRequest $request)
    {
        Book::create($request->validated());
        return redirect('/');
    }

    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    public function update(Book $book, BookFormRequest $request)
    {
        $book->update($request->validated());
        return redirect('/books');
    }

    public function show(Book $book)
    {
        return view('books.show', ['book' => $book]);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/');
    }
}
