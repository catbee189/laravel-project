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

        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
   
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
    <label for="author" class="form-label">Author</label>
    <select name="author" id="author" class="form-select" required>
        <option value="">-- Select an Author --</option>
        
    </select>
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
<div class="mb-3">
        <label class="form-label">Book Cover Image</label>
        <input type="file" name="cover_image" class="form-control">
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