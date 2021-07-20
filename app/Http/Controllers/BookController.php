<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $book = Book::all();

        return response()->json($book);
    }

    public function create(Request $request)
    {
        $book = new Book();

        $book->id = $request->id;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publish = $request->publish;
        $book->description = $request->description;
        $book->save();

        return response('Data saved');
    }

    public function show($id)
    {
        $book = Book::find($id);

        return response()->json($book);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        $book->id = $request->input('id');
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->publish = $request->input('publish');
        $book->description = $request->input('description');
        $book->save();

        return response('Data updated');
    }

    public function deleted($id)
    {
        $book = Book::find($id);
        $book->delete();

        return response('Data deleted');
    }
}
