@extends('layout')

@section('title', isset($movie) ? 'Edit Movie' : '')

<?php session()->put('operationname', 'dashboard'); ?>

@section('content')
<html>
    <body   style="background-color:#06202B">
        <div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header text-primary">
                    <h5 class="mb-0">{{ isset($movie) ? 'Edit Movie Details' : 'Add New Movie' }}</h5>
                </div>

                <div class="card-body">
                    <form action="{{ isset($movie) ? route('movies.update', $movie->id) : route('movies.store') }}" 
                          method="POST" 
                          enctype="multipart/form-data">
                        @csrf
                        
                        @if(isset($movie))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">Movie Title</label>
                            <input type="text" 
                                   name="title" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   value="{{ old('title', $movie->title ?? '') }}" 
                                   required 
                                   placeholder="e.g., Interstellar">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Creator / Author</label>
                            <select name="author_id" class="form-select @error('author_id') is-invalid @enderror" required>
                                <option value="">-- Select Creator / Author --</option>
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}" 
                                        {{ old('author_id', $movie->author_id ?? '') == $author->id ? 'selected' : '' }}>
                                        {{ $author->name }}
                                    </option>
                                @endforeach
                            </select>   
                            @error('author_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Short Description / Tagline</label>
                            <textarea name="description" 
                                      class="form-control @error('description') is-invalid @enderror" 
                                      rows="2" 
                                      placeholder="A brief one or two sentence hook...">{{ old('description', $movie->description ?? '') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Full Movie Synopsis</label>
                            <textarea name="synopsis" 
                                      class="form-control @error('synopsis') is-invalid @enderror" 
                                      rows="6" 
                                      placeholder="Provide the comprehensive detailed narrative overview here...">{{ old('synopsis', $movie->synopsis ?? '') }}</textarea>
                            @error('synopsis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Movie Poster / Image</label>
                            @if(isset($movie) && $movie->cover)
                                <div class="mb-2">
                                    <small class="text-muted d-block mb-1">Current Poster Preview:</small>
                                    <img src="{{ asset($movie->cover) }}" 
                                         alt="Current Movie Poster" 
                                         class="img-thumbnail shadow-sm" 
                                         style="max-height: 120px; object-fit: cover;">
                                </div>
                            @endif
                            <input type="file" 
                                   name="cover" 
                                   class="form-control @error('cover') is-invalid @enderror">
                            <small class="text-muted">Accepted formats: jpeg, png, jpg, gif (Max: 2MB)</small>
                            @error('cover') 
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="{{ route('movies.index') }}" class="btn btn-secondary px-4 me-md-2">Cancel</a>
                            <button type="submit" class="btn {{ isset($movie) ? 'btn-warning' : 'btn-primary' }} px-4">
                                {{ isset($movie) ? 'Update Movie Entry' : 'Save Movie Details' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div> </div> </div> @endsection
    </body>
</html>