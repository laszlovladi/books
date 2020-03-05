<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Bookshop extends Model
{
    public function books(){
        return $this->belongsToMany(Book::class);
    }
}
