<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\BookCollection;
use App\Book;

// inject validator class
use \Illuminate\Validation\Factory as ValidationProvider;

class BookController extends Controller {

  public function store (
    Request $request,
    ValidationProvider $validator
  ) {

    $res = [
      'status' => 0,
      'message' => '',
      'errors' => []
    ];

    $book = new Book([
      'partno' => $request->get('partno'),
      'title' => $request->get('title'),
      'author' => $request->get('author')
    ]);

    $aBook = [
      'partno' => $request->get('partno'),
      'title' => $request->get('title'),
      'author' => $request->get('author')
    ];

    $validation = $validator->make($aBook, [
      'partno' => 'required|regex:/\d\d-\d\d\d\d/',
      'author' => 'required|min:3|max:255',
      'title' => 'required|min:1|max:255'
    ]);

    if ($validation->fails()) {

      $res = [
        'status' =>  0,
        'message' => 'There are problems with your form entries. Please re-try.',
        'errors' => $validation->errors()
      ];

      
      
    } else {
      $book->save();
    }

    return response()->json($res);

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
