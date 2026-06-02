<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Book;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);

        return view('books', compact('books'));
    }

public function create()
{
return view('books_form');
}
public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'author' => 'required',
        'genre' => 'required',
        'publication' => 'required',
    ]);

    Book::create([
        'title' => $request->title,
        'author' => $request->author,
        'genre' => $request->genre,
        'publication' => $request->publication,
    ]);

    return redirect()->route('books')
        ->with('success', 'Book added successfully.');
}   
public function edit($id)
{
$book = Book::findOrFail($id);

return view('books_form', compact('book'));
}
public function update(Request $request, $id)
{
$book = Book::findOrFail($id);

$book->update([
'title' => $request->title,
'author' => $request->author,
'genre' => $request->genre,
'publication' => $request->publication,
]);

return redirect()
->route('books')
->with('success', 'Book updated successfully.');
}
public function destroy($id)
{
Book::findOrFail($id)->delete();

return redirect()
->route('books')
->with('success', 'Book deleted successfully.');
}

}



