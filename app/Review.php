<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Book;

class Review extends Model
{
    // protected $fillable = ['name', 'email', 'text'];
    // protected $guarded = ['id', 'created_at', 'updated_at'];
    // protected $guarded = [];                                              //  allow mass-filling


    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
