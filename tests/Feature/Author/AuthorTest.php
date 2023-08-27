<?php

namespace Tests\Feature\Author;

use App\Models\Author;
use App\Repositories\AuthorReadRepository;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    protected $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new AuthorReadRepository();
    }

    public function test_get_all_authors()
    {
        $name = fake()->name();

        $author = Author::create([
            'name' => $name
        ]);

        $response = $this->get('api/get-all-authors');
        $this->assertDatabaseCount("authors", 1);
        $response->assertJsonFragment([
            "id"=> 1,
            'name' => $name,
        ]);
        $response->assertStatus(200);
    }

    public function test_get_author_by_id()
    {
        $author = Author::create([
            'name' => fake()->name()
        ]);

        $foundAuthor = $this->repository->getAuthorById($author->id);

        $this->assertEquals($author->id, $foundAuthor->id);
    }

    public function test_throws_exception_when_author_not_found()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Author not found");

        $this->repository->getAuthorBooks(99);
    }

    /** @test */
    public function test_get_author_books()
    {
        $author = Author::create([
            'name' => fake()->name()
        ]);

        $author->books()->create(['title' =>  fake()->title]);
        $author->books()->create(['title' =>  fake()->title]);

        $authorBooks = $this->repository->getAuthorBooks($author->id);

        $this->assertCount(2, $authorBooks);
    }
}
