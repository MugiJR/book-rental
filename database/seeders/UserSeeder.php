<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        User::create([
            'name' => 'Reader',
            'email' => 'reader@brs.com',
            'password' => Hash::make('password'),
            ]);
            User::create([
            'name' => 'Librarian',
            'email' => 'librarian@brs.com',
            'password' => Hash::make('password'),
            'is_librarian'=> 1
            ]);
    }
}
