<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class AdminController extends Controller
{
    public function index(){
        $books = Book::with('authors')->get();
        return view('home', ['books'=> $books]);
    }

    public function show($id){
        $book = Book::with('authors')->find($id);
        return view('book', ['book'=> $book]);
    }
}
