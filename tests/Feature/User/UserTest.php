<?php

namespace Tests\Feature\User;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_user()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '35988888888',
            'password' => 'asdfsadfsadf',
        ];

        $response = $this->post('/api/create-user', $userData);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '35988888888',
        ]);
        $response->assertStatus(201);
    }

    public function test_update_user()
    {
        $this->test_create_user();

        $UpdatedName = fake()->name;
        $user = User::first();
        $updatedData = [
            'name' => $UpdatedName,
            'user_id' => $user->id,
        ];

        $response = $this->put('/api/update-user', $updatedData);


        $this->assertDatabaseHas('users', [
            'name' => $UpdatedName,
        ]);
        $this->assertDatabaseCount('users', 1);
    }

    public function test_delete_user()
    {
        $this->test_create_user();
        $user = User::first();

        $response = $this->post('/api/delete-user', ['user_id' => $user->id]);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_assign_book()
    {
        $this->test_create_user();

        $user = User::first();

        $author = Author::create([
            "name" => fake()->name
        ]);

        $bookTitle = fake()->title;
        $data = [
            'author_id' => $author->id,
            'title' => $bookTitle,
        ];

        $response = $this->post('/api/create-book', $data);

        $book = Book::first();

        $result = $this->post('/api/assign-books', [
            'user_id' => $user->id,
            'book_id' => $book->id,
        ]);

        $this->assertTrue($user->books->contains($book));
    }

    public function testUnAssignBook()
    {
        $this->test_assign_book();

        $user = User::first();
        $book = Book::first();

        $result = $this->post('/api/un-assign-books', [
            'user_id' => $user->id,
            'book_id' => $book->id,
        ]);

        $this->assertFalse($user->books->contains($book));
    }
}
