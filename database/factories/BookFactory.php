<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => fake()->sentence(3),
            'author' => fake()->name(),
            'genre' => fake()->randomElement([
                'Programming',
                'Technology',
                'Science',
                'History',
                'Fiction'
            ]),
            'publication' => fake()->year(),
        ];
    }
}