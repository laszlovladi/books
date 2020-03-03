<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';    

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function cart(){
        return $this->hasOne(CartItem::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
