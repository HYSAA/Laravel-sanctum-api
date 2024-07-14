@extends('mainLayout')

@section('page-title', 'Create New Post')

@section('custom-styles')
<style>
    body {
        background-color: #f8f9fa; /* Light gray background */
    }
    .container {
        padding-top: 80px; /* Adjust spacing from the top */
    }
    .card {
        border: 1px solid #dee2e6; /* Light gray border */
        border-radius: 8px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }
    .card-body {
        padding: 2rem;
    }
    .form-label {
        font-weight: bold;
    }
    .form-control {
        border: 1px solid #ced4da; /* Light gray border */
        border-radius: 5px;
        padding: 0.75rem 1rem;
    }
    .form-control:focus {
        border-color: #007bff; /* Focus color */
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Focus shadow */
    }
    .btn-primary {
        background-color: #ffc107; /* Yellow button color */
        color: #212529; /* Dark text color */
        border-color: #ffc107; /* Matching border color */
        border-radius: 5px;
        padding: 0.75rem 1.5rem;
    }
    .btn-primary:hover {
        background-color: #e0a800; /* Darker yellow on hover */
        border-color: #e0a800; /* Matching border color on hover */
    }
    .btn-secondary {
        background-color: #343a40; /* Dark gray button color */
        color: #fff; /* White text color */
        border-color: #343a40; /* Matching border color */
        border-radius: 5px;
        padding: 0.75rem 1.5rem;
    }
    .btn-secondary:hover {
        background-color: #23272b; /* Darker gray on hover */
        border-color: #23272b; /* Matching border color on hover */
    }
</style>
@endsection

@section('page-content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1>Create New Post</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Content</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="5" required>{{ old('body') }}</textarea>
                    @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
        </div>
    </div>
</div>
@endsection
