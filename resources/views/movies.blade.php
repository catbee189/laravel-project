@extends('layout')


<?php session()->put('operationname', 'dashboard'); ?>

@section('content')
<div class="card overflow-hidden shadow-sm">
    <div class="card-body">

        <img src="{{ asset('images/swapped-netflix-movie-everything-we-know.jpg') }}"
             class="img-fluid rounded mb-3"
             alt="Movie Image">

        <h4>Movie Overview</h4>

        <p class="text-muted">
            This movie tells the story of unexpected events that change the lives
            of the main characters. It explores themes of friendship, personal
            growth, and overcoming challenges through exciting and emotional scenes.
        </p>

    </div>
</div>

@endsection