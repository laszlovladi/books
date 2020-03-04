<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;
use App\Book;

class BookQueryBuilderController extends Controller
{
    public function index(){
        // $data = DB::table('books')
        //     ->limit(10)
        //     ->orderBy('title', 'asc')
        //     ->where('authors', 'like', '%agatha%')
        //     ->get();    //   or first()
        // $books = Book::query()
        //     ->limit(10)
        //     ->orderBy('title', 'asc')
        //     ->where('authors', 'like', '%agatha%')
        //     // ->pluck('title', 'id');
        //     ->get();    //   or first()

        // $books = $books->toArray();


        // dd($books);

        $books = Book::query()
            ->orderBy('title', 'asc')
            ->paginate(10);

        return view('books/page', compact('books'));
    }
}
