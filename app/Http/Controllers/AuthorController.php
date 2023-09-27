<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddOrUpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::all();

        return view('authors', ['authors'=>$authors]);
    }

    public function show($id){
        $author = Author::find($id);
        return view('edit-author', ['author'=>$author]);
    }

    public function store(AddOrUpdateAuthorRequest $request){
        $validated = $request->validated();

        $author = Author::create($validated);
        return redirect()->route('authors');
    }

    public function update(AddOrUpdateAuthorRequest $request ,$id){
        $validated = $request->validated();

        $author = Author::find($id);
        $author->name = $validated['name'];
        $author->save();

        return redirect()->route('authors');
    }

    public function delete($id){
       $author = Author::find($id);
       $author->delete();
       return redirect()->route('authors');
    }

    public function addAuthor(){
        return view('add-author');
    }
}
