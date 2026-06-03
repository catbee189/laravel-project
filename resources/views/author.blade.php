@extends('layout')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Authors List</h5>

            <div>
                <span class="badge bg-primary me-2">
                    Total Authors: {{ $authors->total() }}
                </span>

                <a href="{{ route('authors.create') }}" class="btn btn-success btn-sm">
                    + Add Author
                </a>
            </div>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        

            <div class="table-responsive">

                <table class="table table-striped table-hover table-bordered align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th class="text-center" style="width: 160px;">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($authors as $author)
                        <tr>
                            <td>{{ $author->id }}</td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->email }}</td>
                            <td>{{ $author->phone ?? 'N/A' }}</td>
                            <td>{{ $author->address ?? 'N/A' }}</td>
                            <td class="text-center">

                                <a href="{{ route('authors.edit', $author->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('authors.destroy', $author->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this author?');">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-3">No authors found.</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $authors->links() }}
            </div>

        </div>
    </div>

</div>

@endsection