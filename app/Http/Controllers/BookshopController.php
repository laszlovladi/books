<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookshop;
use App\Book;

class BookshopController extends Controller
{
    public function index(){
        $bookshops = Bookshop::all();

        return view('bookshops/index', compact('bookshops'));
    }

    public function show($id){
        $bookshop = Bookshop::findOrFail($id);
        $books = Book::all();

        return view('bookshops/show', compact('bookshop', 'books'));
    }

    public function create(){
        return view('bookshops/create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'city' => 'required|max:255'
        ]);
        $bookshop = new Bookshop;
        $bookshop->name = $request->input('name');
        $bookshop->city = $request->input('city');
        $bookshop->save();
        session()->flash('success_message', 'Success!');
        return redirect('/bookshops/index');
    }

    public function addBook(Request $request, $id){
        $bookshop = Bookshop::findOrFail($id);
        $book = $request->input('book');
        $bookshop->books()->attach($book);
        return $request;
    }
}
