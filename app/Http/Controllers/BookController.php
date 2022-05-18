<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{

    public function store()
    {
        Book::create([
            'title' => request('title'),
            'author' => request('author')
        ]);
    }
}
