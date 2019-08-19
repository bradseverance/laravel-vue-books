<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\BookCollection;
use App\Book;

class BookController extends Controller
{
    public function store(Request $request) {
      $book = new Book([
        'partno' => $request->get('partno'),
        'title' => $request->get('title'),
        'author' => $request->get('author')
      ]);

      $book->save();

      return response()->json('successfully added');
    }

    public function index() {
      return new BookCollection(Book::all());
    }

    public function edit($id) {
      $book = Book::find($id);
      return response()->json($book);
    }

    public function update($id, Request $request) {
      $book = Book::find($id);

      $book->update($request->all());

      return response()->json('successfully updated');
    }

    public function delete($id) {
      $book = Book::find($id);

      $book->delete();

      return response()->json('successfully deleted');
    }
}
