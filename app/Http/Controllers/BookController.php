<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function delete($id){
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('home');
    }
}
