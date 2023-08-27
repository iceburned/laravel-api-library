<?php

namespace Database\Factories;

use Faker\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
