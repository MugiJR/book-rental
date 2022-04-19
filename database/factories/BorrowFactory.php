<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'reader_id'=>$this->faker->randomElement([1,2]),
            'book_id'=>Book::factory(),
            'status'=>$this->faker->randomElement(['PENDING','ACCEPTED','REJECTED','RETURNED']),
            'request_process_at'=>$this->faker->dateTime(),
            'request_managed_by'=>2,
            'deadline'=>$this->faker->dateTime(),
            'returned_at'=>$this->faker->dateTime(),
            'return_managed_by'=>2,
            ];
    }
}


