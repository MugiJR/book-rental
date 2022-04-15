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

    public function add()
    {
        return view('books.add');
    }

    public function store(BookFormRequest $request)
    {
        Book::create($request->validated());
        return redirect('/books');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit', ['book' => $book]);
    }

    public function update($id, BookFormRequest $request)
    {
        $book = Book::find($id);
        $book->update($request->validated());
        return redirect('/books');
    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show', ['book' => $book]);
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('/books');
    }
}
