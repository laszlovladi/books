<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $page = 1;
        $nr_entries = 4;

        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }

        if(isset($_GET['nr_entries'])){
            $nr_entries = $_GET['nr_entries'];
        }

        $query = "
            SELECT *
            FROM `books`
            WHERE 1
            LIMIT " . ($page - 1)*$nr_entries . ", " . $nr_entries;

        $books = \DB::select($query); // or instead of '\' declare 'use DB;'

        $name = 'Vl';
        $surname = 'Las';

        // return view('books')
        //     ->with('name', $name)
        //     ->with('surname', $surname);   // can be 'books/detail/...'

        // return view('books')
        // ->with(['name' => $name ,
        //         'surname' => $surname]);   

        // return view('books', [
        //     'name' => $name,
        //     'surname' => $surname
        //     ]);   

        $comment = "Bla-bla <strong>bla</strong> bla-bla <script>alert('Alert from string')</script>";

        $age = 40;

        return view('books', compact('name', 'surname', 'comment', 'age', 'books'));   
    }
}
