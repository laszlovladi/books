<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

class GenreController extends Controller
{
    public function index(){
        $genres = Genre::all();
        return view('genres/index', compact('genres'));
    }

    public function show($id){
        $genre = Genre::findOrFail($id);
        return view('genres/show', compact('genre'));
    }

    public function create(){
        // $publishers = Publisher::all();
        return view('genres/create'); //, compact('publishers')
    }

    public function store(Request $request){
        $g = new Genre;
        $g->name = $request->input('name');
        $g->save();
        return redirect('/genres/'. $g->id);

    }
}
