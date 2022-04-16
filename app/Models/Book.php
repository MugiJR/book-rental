<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $fillable = [
        'title', 'author', 'description', 'released_at',
        'image_url', 'pages', 'lang_code', 'isbn', 'in_stock'
    ];

    public function genres()
    {
        return $this->belongsToMany(
            Genre::class,
            'book_genre',
            'book_id',
            'genre_id'
        );
    }
}
