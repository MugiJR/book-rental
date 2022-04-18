<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Borrow;
use App\Http\Requests\StoreBorrowRequest;
use App\Http\Requests\UpdateBorrowRequest;
use App\Models\Book;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->is_librarian) {
            $myAllRentals = Borrow::all();
        } else {
            $myAllRentals = auth()->user()->readerBorrows;
        }
        $pendingRentals = $myAllRentals->where('status', 'PENDING');
        $rejectedRentals = $myAllRentals->where('status', 'REJECTED');
        $returnedRentals = $myAllRentals->where('status', 'RETURNED');
        $inTimeAcceptedRentals = $myAllRentals
            ->where('status', '=', 'ACCEPTED')
            ->where('deadline', '>', now());
        $lateRentals = $myAllRentals
            ->where('status', '=', 'ACCEPTED')
            ->where('deadline', '<', now());
        return view(
            'borrows.list',
            [
                'pendingRentals' => $pendingRentals,
                'inTimeAcceptedRentals' => $inTimeAcceptedRentals,
                'lateRentals' => $lateRentals,
                'rejectedRentals' => $rejectedRentals,
                'returnedRentals' => $returnedRentals,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBorrowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBorrowRequest $request)
    {
        $book_id = $request['book'];
        $data = $request->validated();
        $data['reader_id'] = Auth::id();
        $data['book_id'] = $book_id;
        $data['status'] = 'PENDING';
        $data['request_process_at'] = now();
        Borrow::create($data);
        return redirect()->route('books.show', ['book' => $book_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        return view('borrows.show', ['borrow' => $borrow]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBorrowRequest  $request
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBorrowRequest $request, Borrow $borrow)
    {

        $this->authorize('is_librarian');
        $data = $request->validated();
        dd($data);
        if ($data['status'] != 'RETURNED') {
            $data['request_managed_by'] = auth()->id();
        } else {
            $data['return_managed_by'] = auth()->id();
        }
        $borrow->update($data);
        return redirect()->route('borrows.show', ['borrow' => $borrow]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        //
    }
}
