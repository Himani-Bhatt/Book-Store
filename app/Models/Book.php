<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'writer',
        'cover_image',
        'points',
        'stock',
    ];

    public function book_tags()
    {
        return $this->hasMany("App\Models\BookTag", "book_id", "id");
    }
}
