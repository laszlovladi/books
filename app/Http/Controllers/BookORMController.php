<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Publisher;
use App\Genre;
use App\Review;
use App\Bookshop;

class BookORMController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('books/index', compact('books'));
    }

    public function show($id){  // it will be overridden by 1 unless '?' is put in Book route
        $book = Book::findOrFail($id);
        $bookshops = Bookshop::all();
        $books = Book::all();
        $reviews = Review::where('book_id', $id)->get();
        // $publisher = Publisher::find($book->publisher_id);
        return view('books/show', compact('book', 'reviews', 'bookshops', 'books'));   //, 'publisher'
    }

    public function create(){
        $publishers = Publisher::all();
        return view('books/create', compact('publishers'));
    }

    public function store(Request $request){
        // if there is a file named 'image_file' in $request
        if ($file = $request->file('image_file')){
 //                         input name          folder     new name     disk specified in filesystem.php  
            // $request->file('image_file')->store('covers',              'uploads');
            $original_name = $file->getClientOriginalName();
            $request->file('image_file')->storeAs('covers', $original_name, 'uploads');
        }

        $b = new Book;
        $b->title = $request->input('title');
        $b->authors = $request->input('authors');
        // $b->image = $request->input('image');
        $b->image = '/uploads/covers/'.$original_name;
        $b->publisher_id = $request->input('publisher');
        $b->genre_id = 1;
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

    public function addBookshop(Request $request, $id){
        $book = Book::findOrFail($id);
        $bookshop = $request->input('bookshop');
        // $bookshop->books()->attach($book);
        $book->bookshops()->syncWithoutDetaching($bookshop);   // attaches only if doesn't already exist


        return redirect()->back();
    }

    public function removeBookshop(Request $request, $id){
        $book = Book::findOrFail($id);
        $bookshop = $request->input('bookshop');
        $book->bookshops()->detach($bookshop);
        return redirect()->back();  
    }

    public function addRelated(Request $request, $id){
        $book = Book::findOrFail($id);
        $related = $request->input('related');
        // $bookshop->books()->attach($book);
        $book->related()->syncWithoutDetaching($related);   // attaches only if doesn't already exist


        return redirect()->back();
    }

    public function removeRelated(Request $request, $id){
        $book = Book::findOrFail($id);
        $related = $request->input('related');
        $book->related()->detach($related);
        return redirect()->back();  
    }

}
