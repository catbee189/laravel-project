@extends('layout')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm">

   <div class="card-header d-flex justify-content-between align-items-center">
<h5 class="mb-0">Book List</h5>

<div>
<span class="badge bg-primary me-2">
Total Books: {{ $books->total() }}
</span>

<a href="{{ route('books.create') }}" class="btn btn-success btn-sm">
+ Add Book
</a>
</div>
</div>


        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-striped table-hover table-bordered align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Publication</th>
                             <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
<td>
    @if($book->cover_image)
        <img src="{{ asset($book->cover_image) }}" 
             alt="Book Cover" 
             style="width: 100px; height: 100px; object-fit: cover;" 
             class="img-thumbnail">
    @else
        <span class="text-muted small">No Cover</span>
    @endif
</td>                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author->name }}</td>
                            <td>{{ $book->genre }}</td>
                            <td>{{ $book->publication }}</td>
                              <td>

        <a href="{{ route('books.edit', $book->id) }}"
            class="btn btn-warning btn-sm">
            Edit
        </a>

        <form action="{{ route('books.delete', $book->id) }}"
            method="POST"
            class="d-inline">

            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete this book?')">
                Delete
            </button>

        </form>

    </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            <div class="d-flex  mt-3">
                {{ $books->links() }}
            </div>

        </div>
    </div>

</div>

@endsection