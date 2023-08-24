<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleted(function () {

            $orphanedBooks = Book::doesntHave('authors')->get();

            foreach ($orphanedBooks as $book) {
                $book->delete();
            }
        });
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'books_authors', 'author_id', 'book_id');
    }
}
