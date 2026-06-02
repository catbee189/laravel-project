@extends('layout')

@section('title',
    isset($book) ? 'Edit Book' : 'Add Book')

@section('content')

<div class="card">

    <div class="card-header">
        <h5>
            {{ isset($book) ? 'Edit Book' : 'Add Book' }}
        </h5>
    </div>

    <div class="card-body">

        <form
            action="{{ isset($book)
                ? route('books.update', $book->id)
                : route('books.store') }}"
            method="POST">

            @csrf

            <div class="mb-3">
                <label>Title</label>
                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ $book->title ?? '' }}">
            </div>

            <div class="mb-3">
                <label>Author</label>
                <input
                    type="text"
                    name="author"
                    class="form-control"
                    value="{{ $book->author ?? '' }}">
            </div>

            <div class="mb-3">
                <label>Genre</label>
                <input
                    type="text"
                    name="genre"
                    class="form-control"
                    value="{{ $book->genre ?? '' }}">
            </div>

            <div class="mb-3">
                <label>Publication Year</label>
                <input
                    type="number"
                    name="publication"
                    class="form-control"
                    value="{{ $book->publication ?? '' }}">
            </div>

            <button
                type="submit"
                class="btn btn-primary">
                Save
            </button>

            <a
                href="{{ route('books') }}"
                class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</div>

@endsection