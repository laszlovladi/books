<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;
use App\Book;


class PublisherController extends Controller
{
    public function index(){
        $publishers = Publisher::all();
        return view('publishers/index', compact('publishers'));
    }

    public function show($id){  // it will be overridden by 1 unless '?' is put in Book route
        // $publisher_book = [];
        // $books = Book::all();
        // foreach ($books as $book){
        //     if($book->publisher_id == $id){
        //         $publisher_book[$book];
        //     }
        // }
        $books = Book::where('publisher_id', $id)->get();
        
        $publisher = Publisher::findOrFail($id);
        return view('publishers/show', compact('publisher', 'books'));
    }

        public function create(){
            return view('publishers.create');
        }

        public function store(Request $request){
            $p = new Publisher;
            $p->name = $request->input('title');
            $p->save();
            return $p;
        }
}
