@extends('layout')
@section('title', 'User Dashboard')
<?php session()->put('operationname', 'dashboard'); ?>
@section('content')

<div class="card shadow border-0 rounded-4">
    <div class="card-body p-4">

        <div class="text-center mb-4">
            <img src="https://via.placeholder.com/120"
                 class="rounded-circle border shadow-sm"
                 width="120"
                 height="120"
                 alt="Profile">

            <h4 class="mt-3 mb-0 fw-bold">Romel Biala</h4>
            <span class="badge bg-success mt-2">Active User</span>
        </div>

        <hr>

        <div class="row mb-3">
            <div class="col-4 fw-bold text-muted">
                Full Name
            </div>
            <div class="col-8">
                Romel Biala
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-4 fw-bold text-muted">
                Email
            </div>
            <div class="col-8">
                riobiala802@gmail.com
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-4 fw-bold text-muted">
                Status
            </div>
            <div class="col-8">
                <span class="badge bg-success">Active</span>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-4 fw-bold text-muted">
                Role
            </div>
            <div class="col-8">
                User
            </div>
        </div>

        <div class="row">
            <div class="col-4 fw-bold text-muted">
                Joined
            </div>
            <div class="col-8">
                June 2026
            </div>
        </div>

    </div>
</div>
@endsection