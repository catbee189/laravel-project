@extends('layout')

@section('title', isset($authors) ? 'Edit Author' : 'Add Author')

@section('content')

<div class="card">

    <div class="card-header">
        <h5>
            {{ isset($authors) ? 'Edit Author' : 'Add Author' }}
        </h5>
    </div>

    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

     <form 
    action="{{ isset($authors) ? route('authors.update', $authors->id) : route('authors.store') }}" 
    method="POST">
    
    @csrf
    @if(isset($authors))
        @method('PUT')
    @endif
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $authors->name ?? '') }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $authors->email ?? '') }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input
                    type="text"
                    name="phone"
                    class="form-control"
                    value="{{ old('phone', $authors->phone ?? '') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea
                    name="address"
                    class="form-control"
                    rows="3">{{ old('address', $authors->address ?? '') }}</textarea>
            </div>

            <button
                type="submit"
                class="btn btn-primary">
                {{ isset($authors) ? 'Update Author' : 'Save Author' }}
            </button>

            <a
                href="{{ route('authors.index') }}"
                class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</div>

@endsection