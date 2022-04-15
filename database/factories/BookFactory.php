<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'          => $this->faker->word(),
            'author'         => $this->faker->userName(),
            'description'    => $this->faker->optional()->sentence(),
            'released_at'    => $this->faker->date(),
            'image_url'      => $this->faker->optional()->imageUrl(),
            'pages'          => $this->faker->randomDigitNotNull(),
            'lang_code'      => $this->faker->randomNumber(3, false),
            'isbn'           => $this->faker->randomNumber(9, false),
            'in_stock'       => $this->faker->randomDigitNotNull() 
        ];
    }
}
