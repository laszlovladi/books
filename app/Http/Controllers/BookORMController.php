<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Publisher;
use App\Genre;
use App\Review;

class BookORMController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('books/index', compact('books'));
    }

    public function show($id){  // it will be overridden by 1 unless '?' is put in Book route
        $book = Book::findOrFail($id);
        $reviews = Review::where('book_id', $id)->get();
        // $publisher = Publisher::find($book->publisher_id);
        return view('books/show', compact('book', 'reviews'));   //, 'publisher'
    }

    public function create(){
        $publishers = Publisher::all();
        return view('books/create', compact('publishers'));
    }

    public function store(Request $request){
        $b = new Book;
        $b->title = $request->input('title');
        $b->authors = $request->input('authors');
        $b->image = $request->input('image');
        $b->publisher_id = $request->input('publisher');
        $b->save();
        return redirect('/books-orm/'. $b->id);

    }

    public function edit($id){
        $book = Book::find($id);
        $publishers = Publisher::all();
        $genres = Genre::all();
        return view('books/edit', compact('book', 'publishers', 'genres'));
    }

    public function update(Request $request, $id){
        $b = Book::findOrFail($id);
        $b->title = $request->input('title');
        $b->authors = $request->input('authors');
        $b->image = $request->input('image');
        $b->publisher_id = $request->input('publisher');
        $b->genre_id = $request->input('genre');
        $b->save();
        return redirect('/books-orm/'. $b->id);
    }

    public function delete($id){
        $book = Book::find($id);
        $book->delete();
        return redirect('/books-orm/');
    }

}
