@extends('layout')

@section('content')

<div class="container mt-4">
@if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                <div>{{ session('success') }}</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card shadow-sm">
    

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Movie List</h5>

            <div>
                <span class="badge bg-primary me-2">
                    Total Movies: {{ $movies->total() }}
                </span>

                <a href="{{ route('movies.create') }}" class="btn btn-success btn-sm">
                    + Add Movie
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
                            <th>Tagline / Description</th>
                            <th>Synopsis</th>
                            <th>Added On</th> <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($movies as $movie)
                        <tr>
                            <td>{{ $movie->id }}</td>
                            <td>
    @if($movie->cover)
        <img src="{{ asset($movie->cover) }}" 
             alt="Book Cover" 
             style="width: 100px; height: 100px; object-fit: cover;" 
             class="img-thumbnail">
    @else
        <span class="text-muted small">No Cover</span>
    @endif
</td>   
                            <td><strong>{{ $movie->title }}</strong></td>
                            
                            <td>{{ $movie->author->name ?? 'Unknown' }}</td>
                            
                            <td>{{ Str::limit($movie->description, 50, '...') ?? 'No Description' }}</td>
                            
                            <td>
                                <span title="{{ $movie->synopsis }}">
                                    {{ Str::limit($movie->synopsis, 80, '...') ?? 'No Synopsis' }}
                                </span>
                            </td>
                            
                            <td>
                                @if($movie->created_at)
                                    <span class="text-secondary small">
                                        {{ $movie->created_at->format('M d, Y') }}
                                    </span>
                                    <br>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        ({{ $movie->created_at->diffForHumans() }})
                                    </small>
                                @else
                                    <span class="text-muted small">-</span>
                                @endif
                            </td>
                            
                            <td class="text-center">
                                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('movies.delete', $movie->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this movie?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>

            {{-- Pagination Links --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $movies->links() }}
            </div>

        </div>
    </div>

</div>

@endsection