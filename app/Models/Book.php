<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function authors()
    {
        return $this->belongsToMany(Authors::class, 'books_authors');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_book', 'book_id', 'user_id');
    }
}
