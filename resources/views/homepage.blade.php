@extends('mainLayout')

@section('page-title', 'Home')

@section('custom-styles')
<style>
    body {
        background-color: #f8f9fa;
    }
    .container {
        padding-top: 80px;
    }
    .card {
        border: 1px solid #dee2e6;
        border-radius: 8px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background-color: #007bff;
        color: #fff;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        padding: 1rem;
        font-weight: bold;
    }
    .card-body {
        padding: 1.5rem 2rem;
    }
    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }
    .card-text {
        color: #495057;
    }
    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
        border-radius: 4px;
        padding: 0.75rem 1.5rem;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    .btn-secondary {
        background-color: #6c757d;
        color: #fff;
        border-color: #6c757d;
        border-radius: 4px;
        padding: 0.75rem 1.5rem;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #5a6268;
    }
    .btn-warning {
        background-color: #ffc107;
        color: #212529;
        border-color: #ffc107;
        border-radius: 4px;
        padding: 0.75rem 1.5rem;
    }
    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #e0a800;
        color: #212529;
    }
    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        border-color: #dc3545;
        border-radius: 4px;
        padding: 0.75rem 1.5rem;
    }
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #c82333;
    }
    .alert-info {
        background-color: #d1ecf1;
        border-color: #bee5eb;
        color: #0c5460;
    }
</style>
@endsection

@section('page-content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h1>Welcome, {{ Auth::user()->name }}</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-secondary float-right">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2>Latest Posts</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($posts as $post)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="https://via.placeholder.com/50" alt="User Profile Picture" class="rounded-circle">
                                            </div>
                                            <div class="col-md-10">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h5 class="card-title">{{ $post->user->name }}</h5>
                                                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                                </div>
                                                <p class="card-text">{{ $post->title }}</p>
                                                <p class="card-text">{{ Str::limit($post->body, 150) }}</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-primary">Read More</a>
                                                    <small class="text-muted">{{ $post->comments->count() }} comments</small>
                                                </div>
                                            </div>
                                        </div>
                                        @if(Auth::id() === $post->user_id)
                                            <div class="row mt-3">
                                                <div class="col-md-12 text-right">
                                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning mr-2">Edit</a>
                                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                            @if($posts->isEmpty())
                                <div class="alert alert-info">
                                    No posts available. <a href="{{ route('posts.create') }}">Create a new post</a>.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
