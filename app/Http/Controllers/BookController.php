<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookFormRequest;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function main()
    {
        $numberOfBooks = Book::all()->count();
        $numberOfUsers = \App\Models\User::all()->count();
        $numberOfGenres = \App\Models\Genre::all()->count();
        $numberOfActiveBookRentals = \App\Models\Borrow::all()->where('status','ACCEPTED')->count();
        $genreList = \App\Models\Genre::all();

        return view(
            'main',
            [
                'numberOfBooks' => $numberOfBooks,
                'numberOfUsers' => $numberOfUsers,
                'numberOfGenres' => $numberOfGenres,
                'numberOfActiveBookRentals' => $numberOfActiveBookRentals,
                'genreList' => $genreList
            ]
        );
    }
    public function index()
    {
        $books = Book::all();
        return view('books.list', ['books' => $books]);
    }

    public function create()
    {
        $genres = Genre::all();
        return view('books.add', ['genres' => $genres]);
    }

    public function store(BookFormRequest $request)
    {
        $data = $request->validated();
        $genre = Book::create($data);
        if (isset($data['genres'])) {
            $genre->genres()->attach($data['genres']);
        }
        return redirect('/');
    }

    public function edit(Book $book)
    {
        $genres = Genre::all();
        $book->load('genres');
        return view('books.edit', compact('book', 'genres'));
    }

    public function update(Book $book, BookFormRequest $request)
    {
        $data = $request->validated();
        $book->update($data);
        $book->genres()->sync($data['genres'] ?? []);
        return redirect('/books');
    }

    public function show(Book $book)
    {
        // $numberOfAvailableBooks = $book->in_stock - $book->activeBorrows()->count();
        // dd($numberOfAvailableBooks);
        return view('books.show', ['book' => $book]);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/');
    }
}
