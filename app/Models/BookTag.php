<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookTag extends Model
{
    protected $table = 'book_tag';

    protected $fillable = [
        'book_id',
        'tag_id',
    ];

    public function tag()
    {
        return $this->hasOne("App\Models\Tag", "id", "tag_id");
    }
}
