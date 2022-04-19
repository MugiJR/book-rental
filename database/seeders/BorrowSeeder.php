<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Borrow;


class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('borrows')->truncate();
        // Borrow::factory()
        //     ->count(10)
        //     ->create();
        DB::table('borrows')->truncate();
        $book = Book::all();
        Borrow::create([
            'reader_id' => 1,
            'book_id' => Book::find(1)->id,
            'status' => 'PENDING',
            'request_process_at' => null,
            'request_managed_by' => null,
            'deadline' => null,
            'returned_at' => null,
            'return_managed_by' => null,
        ]);
        Borrow::create([
            'reader_id' => 1,
            'book_id' => Book::find(2)->id,
            'status' => 'PENDING',
            'request_process_at' => null,
            'request_managed_by' => null,
            'deadline' => null,
            'returned_at' => null,
            'return_managed_by' => null,
        ]);
        Borrow::create([
            'reader_id' => 1,
            'book_id' => Book::find(3)->id,
            'status' => 'ACCEPTED',
            'request_process_at' => now(),
            'request_managed_by' => 2,
            'deadline' => date('Y-m-d', strtotime( now() . " +5 days")),
            'returned_at' => null,
            'return_managed_by' => null,
        ]);
        Borrow::create([
            'reader_id' => 1,
            'book_id' => Book::find(4)->id,
            'status' => 'ACCEPTED',
            'request_process_at' => now(),
            'request_managed_by' => 2,
            'deadline' => date('Y-m-d', strtotime( now() . " +10 days")),
            'returned_at' => null,
            'return_managed_by' => null,
        ]);
        Borrow::create([
            'reader_id' => 1,
            'book_id' => Book::find(5)->id,
            'status' => 'ACCEPTED',
            'request_process_at' => now(),
            'request_managed_by' => 2,
            'deadline' => date('Y-m-d', strtotime( now() . " -5 days")),
            'returned_at' => null,
            'return_managed_by' => null,
        ]);
        Borrow::create([
            'reader_id' => 1,
            'book_id' => Book::find(6)->id,
            'status' => 'ACCEPTED',
            'request_process_at' => now(),
            'request_managed_by' => 2,
            'deadline' => date('Y-m-d', strtotime( now() . " -10 days")),
            'returned_at' => null,
            'return_managed_by' => null,
        ]);
        Borrow::create([
            'reader_id' => 1,
            'book_id' => Book::find(7)->id,
            'status' => 'REJECTED',
            'request_process_at' => now(),
            'request_managed_by' => 2,
            'deadline' => date('Y-m-d', strtotime( now() . " -10 days")),
            'returned_at' => null,
            'return_managed_by' => null,
        ]);
        Borrow::create([
            'reader_id' => 1,
            'book_id' => Book::find(8)->id,
            'status' => 'REJECTED',
            'request_process_at' => now(),
            'request_managed_by' => 2,
            'deadline' => date('Y-m-d', strtotime( now() . " +5 days")),
            'returned_at' => null,
            'return_managed_by' => null,
        ]);
        Borrow::create([
            'reader_id' => 1,
            'book_id' => Book::find(9)->id,
            'status' => 'RETURNED',
            'request_process_at' => now(),
            'request_managed_by' => 2,
            'deadline' => date('Y-m-d', strtotime( now() . " +5 days")),
            'returned_at' => date('Y-m-d', strtotime( now() . " +3 days")),
            'return_managed_by' => 2,
        ]);

    }
}
