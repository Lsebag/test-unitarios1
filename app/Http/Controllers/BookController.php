<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'titulo'=>["required"]
        ]);
        $book=new Book();
        $book->titulo= $request->input('titulo');
        $book->save();
        // return "El libro con título ".$book->titulo." ha sido insertado";
        return $book;
    }

    /**
     * Display the specified resource.
     */
    // public function show(int $book)
    public function show(Book $book)
    {
        //
        // $book=Book::find($book);
        return $book;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->titulo=$request->input('titulo');
        $book->update();
        return $book;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return "Se ha eliminado el libro con id ".$book->id;

    }
}
