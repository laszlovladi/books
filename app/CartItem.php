<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    public $cart_items = 'cart_items';

    public function book(){
        return $this->belongsTo(Book::class);
    }

}
