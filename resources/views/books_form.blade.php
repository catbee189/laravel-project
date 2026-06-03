@extends('layout')

@section('title', isset($book) ? 'Edit Book' : 'Add Book')

<?php session()->put('operationname', 'dashboard'); ?>

@section('content')

<div class="card shadow-sm mt-4">

    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">
            {{ isset($book) ? 'Edit Book Details' : 'Add New Book' }}
        </h5>
    </div>

    <div class="card-body">

        <form action="{{ isset($book) ? route('books.update', $book->id) : route('books.store') }}" 
              method="POST" 
              enctype="multipart/form-data">
   
            @csrf

            @if(isset($book))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label fw-bold">Title</label>
                <input type="text" 
                       name="title" 
                       class="form-control @error('title') is-invalid @enderror" 
                       value="{{ old('title', $book->title ?? '') }}" 
                       required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author_id" class="form-label fw-bold">Author</label>
                <select name="author_id" id="author_id" class="form-select @error('author_id') is-invalid @enderror" required>
                    <option value="">-- Select an Author --</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" 
                            {{ old('author_id', $book->author_id ?? '') == $author->id ? 'selected' : '' }}>
                            {{ $author->name }} ({{ $author->email }})
                        </option>
                    @endforeach
                </select>
                @error('author_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Genre</label>
                <input type="text" 
                       name="genre" 
                       class="form-control @error('genre') is-invalid @enderror" 
                       value="{{ old('genre', $book->genre ?? '') }}" 
                       required>
                @error('genre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Publication Year</label>
                <input type="number" 
                       name="publication" 
                       class="form-control @error('publication') is-invalid @enderror" 
                       value="{{ old('publication', $book->publication ?? '') }}" 
                       required>
                @error('publication')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Book Cover Image</label>
                @if(isset($book) && $book->cover_image)
                    <div class="mb-2">
                        <small class="text-muted d-block">Current Cover:</small>
                        <img src="{{ asset($book->cover_image) }}" alt="Current Cover" class="img-thumbnail" style="max-height: 120px;">
                    </div>
                @endif
                <input type="file" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror">
                @error('cover_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4 gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn {{ isset($book) ? 'btn-warning' : 'btn-primary' }} px-4">
                    {{ isset($book) ? 'Update Book' : 'Save Book' }}
                </button>

                <a href="{{ route('books') }}" class="btn btn-secondary px-4">
                    Cancel
                </a>
            </div>

        </form>

    </div>

</div>

@endsection