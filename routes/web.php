<?php
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\DashboardController;
Route::get('/dashboard', function () {

    if (!session()->has('user_id')) {
        return redirect()->route('Login')
            ->with('error', 'Please login first.');
    }

    return view('dashboard');

})->name('dashboard');


Route::get('/movies', function () {
    return view('movies');
    
})->name('movies');

Route::get('/books', function () {
    return view('books');
    
})->name('books');
Route::get('/author', function () {
    return view('author');
    
})->name('author');
Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');Route::get('/myprofile', function () {

    if (!session()->has('user_id')) {
        return redirect()->route('Login');
    }

    return view('myprofile');

});
Route::get('/mysettings', function () {
    return view('mysettings');
    
})->name('mysettings');

use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;

Route::get('/books', [BooksController::class, 'index'])->name('books');


Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');



Route::post('/books/store', [BooksController::class, 'store'])
->name('books.store');

Route::get('/books/edit/{id}', [BooksController::class, 'edit'])
->name('books.edit');

Route::post('/books/update/{id}', [BooksController::class, 'update'])
->name('books.update');

Route::delete('/books/delete/{id}', [BooksController::class, 'destroy'])
->name('books.delete');


Route::get('/registration', function () {
    return view('registration');
})->name('registration');

Route::get('/Login', function () {

    if (session()->has('user_id')) {
        return redirect()->route('dashboard')
            ->with('success', 'You are already logged in.');
    }

    return view('Login');

})->name('Login');
Route::post('/Login', [AuthController::class, 'Login'])->name('Login.post');

Route::post('/logout', function () {
    session()->forget('user_id');
    session()->flush();

    return redirect()->route('Login')
        ->with('success', 'Logged out successfully.');
})->name('logout');

Route::get('/myprofile', [ProfileController::class, 'index'])->name('profile');
Route::post('/myprofile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/register', [AuthController::class, 'register']);




// Explicit routes matching the specific 'author' view naming structure
Route::get('/author', [AuthorController::class, 'index'])->name('authors.index');// List authors
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');

// Create form view
Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');

// SAVE NEW AUTHOR (This is the missing route!)
Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');

// Edit form view
Route::get('/authors/{id}/edit', [AuthorController::class, 'edit'])->name('authors.edit');

// UPDATE EXISTING AUTHOR
Route::put('/authors/{id}', [AuthorController::class, 'update'])->name('authors.update');

// Delete author
Route::delete('/authors/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');

Route::get('/dashboards', [DashboardController::class, 'index'])->name('dashboards');