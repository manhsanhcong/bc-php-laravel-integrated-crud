<?php

use Illuminate\Database\Seeder;
use App\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = new Book();
        $book->title = 'Doremon';
        $book->descriptron = 'abc';
        $book->content = 'def';
        $book->image = ' ';
        $book->save();

        $book = new Book();
        $book->title = 'Connan';
        $book->descriptron = 'abc';
        $book->content = 'def';
        $book->image = ' ';
        $book->save();

        $book = new Book();
        $book->title = 'Ngon tinh';
        $book->descriptron = 'abc';
        $book->content = 'def';
        $book->image = ' ';
        $book->save();
    }
}
