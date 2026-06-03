<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
// Note: If you don't have a Book model yet, you can create it or comment out Book references
use App\Models\Book; 

class DashboardController extends Controller
{
    public function index()
    {
        // Gather database counts
        $totalAuthors = Author::count();
        $totalBooks = class_exists(Book::class) ? Book::count() : 0;

        // Fetch recent entries for preview lists
        $recentAuthors = Author::latest()->take(5)->get();
        $recentBooks = class_exists(Book::class) ? Book::latest()->take(5)->get() : collect();

        return view('dashboards', compact(
            'totalAuthors', 
            'totalBooks', 
            'recentAuthors', 
            'recentBooks'
        ));
    }
}