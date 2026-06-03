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
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB file
    ]);
$imagePath = null;

if ($request->hasFile('cover_image')) {
    $file = $request->file('cover_image');
    
    // 1. Generate a unique file name to prevent files from overwriting each other
    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    
    // 2. Move the file physically to the public/fbooks folder
    $file->move(public_path('fbooks'), $filename);
    
    // 3. Save the relative path string to store in your database column
    $imagePath = 'fbooks/' . $filename;
}

Book::create([
    'title'       => $request->title,
    'author'      => $request->author,
    'genre'       => $request->genre,
    'publication' => $request->publication,
    'cover_image' => $imagePath, // Stores: "fbooks/1717414628_665db12345.jpg"
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



