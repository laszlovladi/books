<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function store(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'text' => 'required|max:255'
        ]);
        $r = new Review;
        $r->name = $request->input('name');
        $r->email = $request->input('email');
        $r->review = $request->input('text');
        $r->book_id = $id;
        $r->save();
        session()->flash('success_message', 'Success!');
        return redirect('/books-orm/'. $id);
    }

}
