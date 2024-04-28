<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'book_id',
        'user_id',
        'cancelled',
        'points',
    ];

    public function book()
    {
        return $this->hasOne("App\Models\Book", "id", "book_id");
    }

    public function user()
    {
        return $this->hasOne("App\Models\User", "id", "user_id");
    }

}
