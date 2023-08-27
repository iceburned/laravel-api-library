<?php

namespace Tests\Feature\Book;

use App\Models\Author;
use App\Models\Book;
use App\Repositories\BookWriteRepository;
use Database\Factories\AuthorFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_book()
    {
        $author = Author::create([
            "name" => fake()->name
        ]);

        $bookTitle = fake()->title;
        $data = [
            'author_id' => $author->id,
            'title' => $bookTitle,
        ];

        $response = $this->post('/api/create-book', $data);

        $this->assertDatabaseCount('books_authors', 1);

        $response->assertStatus(201);

        $this->assertSame($data['title'], $bookTitle);
    }

    public function test_update_book()
    {
        $this->test_create_book();
        $newTitle = fake()->title;
        $book = Book::first();
        $newData = [
            'book_id' => $book->id,
            'title' => $newTitle
        ];

        $response = $this->post('/api/update-book', $newData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('books', ['title' => $newTitle]);
        $this->assertDatabaseCount('books', 1);
    }

    public function testDeleteBook()
    {
        $this->test_create_book();
        $author = Author::first();
        $book = Book::first();

        $data = [
            'author_id' => $author->id,
            'book_id' => $book->id,
        ];

        $response = $this->post('/api/delete-book', $data);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
        $this->assertDatabaseEmpty('books');
    }
}
