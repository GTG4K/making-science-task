<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Book;

class AdminController extends Controller
{
    public function index(Request $request){
        $searchQuery = request('search');
        $books = Book::with('authors');
        
        if($searchQuery){
            $books->where(function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%')
                    ->orWhereHas('authors', function ($authorQuery) use ($searchQuery) {
                    $authorQuery->where('name', 'like', '%' . $searchQuery . '%');
                });
            });
        }

        $books = $books->get();
        return view('home', ['books'=> $books]);
    }

    public function show($id){
        $book = Book::with('authors')->find($id);
        $authors = Author::all();
        return view('edit-book', ['book'=> $book, 'authors' => $authors]);
    }

    public function addBook(){
        $authors = Author::all();
        return view('add-book', ['authors' => $authors]);
    }
}
