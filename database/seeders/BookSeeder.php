<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
//        Book::factory()->count(10)->create();

        Book::factory(5)->create()->each(function ($book) {
            $authors = Author::inRandomOrder()->limit(rand(1, 3))->get(); // You can adjust the number of authors per book

            foreach ($authors as $author) {
                $author->books()->create([
                    'title' => $book->title,
                ]);
            }

        });
    }
}
