<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
//use Faker\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
        ];
    }
}
