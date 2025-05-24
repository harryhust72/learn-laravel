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
    protected $model = \App\Models\Book::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'price' => $this->faker->numberBetween(100, 1000),
            'description' => $this->faker->text(200),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
