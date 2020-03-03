<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $publisher = 'publishers';    

    public function books(){
        return $this->hasMany(Book::class);
    }
}
