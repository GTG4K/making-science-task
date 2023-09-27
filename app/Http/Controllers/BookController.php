<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function store(UpdateBookRequest $request){
        $validated = $request->validated();

        $book = Book::create([
            'name' => $validated['name'],
            'status' => $validated['status'],
            'release_date' => $validated['release_date'],
        ]);

        $book->authors()->sync($validated['authors']);

        return redirect()->route('home');
    }

    public function update(UpdateBookRequest $request, $id){
        $validated = $request->validated();

        $book = Book::find($id);

        $book->name = $validated['name'];
        $book->status = $validated['status'];
        $book->release_date = $validated['release_date'];
        $book->authors()->sync($validated['authors']);

        $book->save();
        return redirect()->route('home');
    }

    public function delete($id){
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('home');
    }
}
