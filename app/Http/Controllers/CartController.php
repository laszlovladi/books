<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartItem;


class CartController extends Controller
{
    public function index(){
        $cart_items = CartItem::all();
        return view('cart/index', compact('cart_items'));
    }

    public function add($book_id){
        $item = CartItem::where('book_id', $book_id)->first();
        if ($item === null){
            $cart_item = new CartItem;
            $cart_item->book_id = $book_id;
            $cart_item->count = 1;
            $cart_item->save();
        }else{
            $item->count++;
            $item->save();
        }
        return redirect('cart');
    }

    public function postAdd(Request $request){
        $item = CartItem::where('book_id', $request->input('book_id'))->first();
        if ($item === null){
            $cart_item = new CartItem;
            $cart_item->book_id = $request->input('book_id');
            $cart_item->count = 1;
            $cart_item->save();
        }else{
            $item->count++;
            $item->save();
        }

        return redirect('cart');

    }
}
