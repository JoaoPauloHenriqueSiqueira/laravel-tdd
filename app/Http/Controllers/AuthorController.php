<?php

namespace App\Http\Controllers;

use App\Models\Author;

class AuthorController extends Controller
{
    public function store()
    {
        $validate = request()->validate(['name' => 'required', 'dob' => 'required']);
        Author::create($validate);
    }
}
