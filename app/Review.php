<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // protected $fillable = ['name', 'email', 'text'];
    // protected $guarded = ['id', 'created_at', 'updated_at'];
    // protected $guarded = [];                                              //  allow mass-filling


    public function book(){
        return $this->belongsTo(Book::class);
    }
}
