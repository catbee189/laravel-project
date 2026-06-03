<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    // Display the table list
    public function index()
    {
        $authors = Author::latest()->paginate(10); // Now it will find it!
        return view('author', compact('authors'));
    }

    // Show the creation form view
    public function create()
    {
        return view('authors');
    }

    // Store a new author
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:authors,email',
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        Author::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('authors.index')->with('success', 'Author added successfully.');
    }

    // Show the edit form view
    public function edit($id)
    {
        $authors = Author::findOrFail($id);
        return view('authors', compact('authors'));
    }

    // Update the author details
    public function update(Request $request, $id)
    {
        $authors= Author::findOrFail($id);

        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:authors,email,' . $id,
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $authors->update([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }

    // Delete an author record
    public function destroy($id)
    {
        Author::findOrFail($id)->delete();
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
}