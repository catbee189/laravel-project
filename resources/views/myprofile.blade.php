@extends('layout')
@section('title', 'My Profile')

@section('content')

<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Profile Information</h5>
    </div>

    <div class="card-body">
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
                <div class="col-md-4">
                    <label for="current_password" class="form-label">Current Password</label>
                  <input type="password" name="current_password" placeholder="Current Password">

                </div>

                <div class="col-md-4">
                    <label for="new_password" class="form-label">New Password</label>
                     <input type="password" name="new_password" placeholder="New Password">

                </div>

                <div class="col-md-4">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                  <input type="password" name="new_password_confirmation" placeholder="Confirm New Password">

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