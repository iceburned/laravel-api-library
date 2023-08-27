<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {
            $book = Book::whereDoesntHave('users')->inRandomOrder()->first();

            if ($book) {
                $book->users()->attach($user);
            }
        });
    }
}
