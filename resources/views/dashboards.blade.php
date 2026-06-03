@extends('layout')

@section('content')
<div class="container mt-4">
    
    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-b">
        <div>
            <h2 class="fw-bold text-light">Management Dashboard</h2>
            <p class="text-light mb-0">Overview metrics for your laundry application systems.</p>
        </div>
        <div class="text-light font-monospace small">
            {{ now()->format('l, F j, Y') }}
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-12 col-md-6">
            <div class="card border-0 bg-primary text-white shadow-sm h-100">
                <div class="card-body p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase text-white-50 small fw-bold">Total Authors</h6>
                        <h2 class="display-5 fw-bold mb-0">{{ $totalAuthors }}</h2>
                    </div>
                    <div>
                        <a href="{{ route('authors.index') }}" class="btn btn-light btn-sm font-weight-bold text-primary">
                            Manage Authors →
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card border-0 bg-success text-white shadow-sm h-100">
                <div class="card-body p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase text-white-50 small fw-bold">Total Books</h6>
                        <h2 class="display-5 fw-bold mb-0">{{ $totalBooks }}</h2>
                    </div>
                    <div>
                        <a href="{{ Route::has('books.index') ? route('books.index') : '#' }}" class="btn btn-light btn-sm font-weight-bold text-success">
                            Manage Books →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-xl-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom-0">
                    <h5 class="mb-0 fw-bold text-secondary">Recently Added Authors</h5>
                    <a href="{{ route('authors.create') }}" class="btn btn-outline-primary btn-sm">+ Add</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0 table-hover text-nowrap">
                            <thead class="table-light text-muted small uppercase">
                                <tr>
                                    <th class="px-4">Name</th>
                                    <th>Contact Info</th>
                                    <th class="text-end px-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentAuthors as $author)
                                    <tr>
                                        <td class="px-4 font-weight-medium">{{ $author->name }}</td>
                                        <td>
                                            <span class="d-block small text-dark">{{ $author->email }}</span>
                                            <span class="text-muted extra-small">{{ $author->phone ?? 'No Phone' }}</span>
                                        </td>
                                        <td class="text-end px-4">
                                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-sm btn-link text-warning p-0 me-2">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-muted">No authors registered yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom-0">
                    <h5 class="mb-0 fw-bold text-secondary">Recently Added Books</h5>
                    <button class="btn btn-outline-success btn-sm" disabled>+ Add</button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0 table-hover text-nowrap">
                            <thead class="table-light text-muted small uppercase">
                                <tr>
                                    <th class="px-4">Title</th>
                                    <th>Metadata</th>
                                    <th class="text-end px-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentBooks as $book)
                                    <tr>
                                        <td class="px-4 font-weight-medium">{{ $book->title }}</td>
                                        <td>
                                            <span class="badge bg-light text-dark">{{ $book->genre }}</span>
                                            <span class="text-muted small ms-2">{{ $book->publication }}</span>
                                        </td>
                                        <td class="text-end px-4">
                                            <button class="btn btn-sm btn-link text-warning p-0" disabled>Edit</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-muted">No books registered yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection