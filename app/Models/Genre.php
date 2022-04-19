<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = ['name', 'style'];

    public function books()
    {
        return $this->belongsToMany(
            Book::class,
            'book_genre',
            'genre_id',
            'book_id'
        );
    }
}
