<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Author; // CRUCIAL: Import the Author model to populate dropdown menus

class MovieController extends Controller
{
    /**
     * Display a listing of the movies.
     */
   public function index()
{
    // 1. Fetch the movies from the database
    $movies = Movie::with('author')->paginate(4);

    // 2. CRUCIAL: Check your view path and compact spelling!
    // If your blade file is named 'movies.blade.php', use 'movies'.
    // If your blade file is inside a folder 'movies/index.blade.php', use 'movies.index'.
    return view('movies', compact('movies')); 
}
    /**
     * Show the form for creating a new movie.
     */
    public function create()
    {
        // Fetch authors alphabetically to display in your form's dropdown menu
        $authors = Author::orderBy('name', 'asc')->get();

        return view('movie_form', compact('authors')); // Updated path
    }

    /**
     * Store a newly created movie in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'author_id'   => 'required|exists:authors,id', 
            'description' => 'nullable|string|max:500',       
            'synopsis'    => 'nullable|string',  
          'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB file
             
        ]);
$imagePath = null;

if ($request->hasFile('cover')) {
    $file = $request->file('cover');
    
    // 1. Generate a unique file name to prevent files from overwriting each other
    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    
    // 2. Move the file physically to the public/fbooks folder
    $file->move(public_path('fmovie'), $filename);
    
    // 3. Save the relative path string to store in your database column
    $imagePath = 'fmovie/' . $filename;
}
        Movie::create([
            'title'       => $request->title,
              'cover'       => $imagePath, // Stores: "fmovie/1717414628_665db1.jpg"
            'author_id'   => $request->author_id,
            'description' => $request->description,
            'synopsis'    => $request->synopsis,
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie added successfully.');
    }

    /**
     * Show the form for editing the specified movie.
     */
 public function edit($id)
{
    // 1. FIXED: Changed variable name to singular $movie to match compact()
    $movie = Movie::findOrFail($id);

    // 2. Fetch authors for the dropdown menu
    $authors = Author::orderBy('name', 'asc')->get(); 

    // 3. FIXED: Pointing exactly to your single 'movie_form.blade.php' template
    return view('movie_form', compact('movie', 'authors'));
}
    /**
     * Update the specified movie in storage.
     */
    public function update(Request $request, $id)
    {
        $movies = Movie::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'author_id'   => 'required|exists:authors,id',
            'description' => 'nullable|string|max:500',
            'synopsis'    => 'nullable|string',
            'cover'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB Max
        ]);

       $imagePath = $movies->cover; 

    // 4. Check if a new file is being uploaded
    if ($request->hasFile('cover')) {
        
        // OPTIONAL BUT RECOMMENDED: Delete the old physical file if a new one replaces it
        if ($movies->cover && file_exists(public_path($movies->cover))) {
            @unlink(public_path($movies->cover));
        }

        // Process and save the fresh image upload file
        $file = $request->file('cover');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('fmovie'), $filename);
        
        // Update our variable with the new asset file location string prefix path
        $imagePath = 'fmovie/' . $filename;
    }

    // 5. Save the modified details straight back to your database row layout
    $movies->update([
        'title'       => $request->title,
        'cover'       => $imagePath, // Stays as old file path if no new file was submitted
        'author_id'   => $request->author_id,
        'description' => $request->description,
        'synopsis'    => $request->synopsis,
    ]);

    return redirect()->route('movies.index')->with('success', 'Movie profile modified successfully.');
}

    /**
     * Remove the specified movie from storage.
     */
    public function destroy($id)
    {
        $movies = Movie::findOrFail($id);
        $movies->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }
}