<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // take data from json file
        $source_file = storage_path('books.json');  //generates abs path to file within storage folder
        $data = json_decode(file_get_contents($source_file), true);    // true  decodes it as array, false - object

        // put it into our db
        foreach($data as $d){
            $book = new Book;
            // Book::create();      //can be also used
            $book->publisher_id = 1;
            $book->genre_id = 1;
            $book->title    = $d['title'];
            $book->authors  = $d['author'];
            $book->image    = $d['image'];
            $book->save();
        }
    }
}
