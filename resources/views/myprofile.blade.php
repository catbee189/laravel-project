@extends('layout')
@section('title', 'My Profile')

@section('content')

<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Profile Information</h5>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Validation Errors:</strong>
                <ul class="mb-0 mt-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
<form action="{{ route('profile.update') }}" method="POST">
                    @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname"
                        value="{{ session('name') }}">
                </div>

                <div class="col-md-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                       value="{{ session('username') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email"
                       value="{{ session('email') }}">
                </div>

                <div class="col-md-6">
                    <label for="contact" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="contact" name="contact"
                       value="{{ session('contact_number') }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3">{{ session('address') }}</textarea>
            </div>

            <hr>

            <h6 class="mb-3">Change Password</h6>

            <div class="row mb-3">
             <div class="col-md-4 mb-3">
    <label for="current_password" class="form-label">Current Password</label>
    <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Enter current password">
</div>

<div class="col-md-4 mb-3">
    <label for="new_password" class="form-label">New Password</label>
    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Minimum 6 characters">
</div>

<div class="col-md-4 mb-3">
    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" placeholder="Repeat new password">
</div>
            </div>

            <div class="text-end">
                <button type="reset" class="btn btn-secondary">
                    Reset
                </button>

                <button type="submit" class="btn btn-primary">
                    Save Profile
                </button>
            </div>
        </form>
    </div>
</div>

@endsection