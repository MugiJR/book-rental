<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $fillable = ['title', 'author', 'description', 'released_at', 
        'image_url', 'pages', 'lang_code', 'isbn', 'in_stock'];
}
