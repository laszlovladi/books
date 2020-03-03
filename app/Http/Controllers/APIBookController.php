<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIBookController extends Controller
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

        // dd($books);             // the same as var_dump($movies);  die();

        return $books;
    }
}
