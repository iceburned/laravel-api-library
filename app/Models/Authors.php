<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'book_id',
        'author_id',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'books_authors');
    }
}
