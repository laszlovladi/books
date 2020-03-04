<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BooksSeeder::class);
        // $this->call(PublishersSeeder::class);
        // $this->call(GenresSeeder::class);
        // $this->call(...Seeder::class);
    }
}
