@extends('mainLayout')

@section('page-title', 'Edit Post')

@section('page-content')
<style>
  .container {
    max-width: 960px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100vh;
  }

  .card {
    background-color: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 5px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
    width: 50%;
    margin: 0 auto;
  }

  .card-body {
    padding: 1.5rem;
  }

  .form-label {
    margin-bottom: 0.5rem;
    font-weight: bold;
  }

  .form-control {
    border: 1px solid #ccc;
    padding: 0.75rem 1rem;
    border-radius: 3px;
  }

  .is-invalid {
    border-color: #e74c3c;
  }

  .invalid-feedback {
    color: #e74c3c;
    display: block;
  }

  .btn-primary {
    background-color: #3498db;
    color: #fff;
    border-color: #3498db;
    border-radius: 3px;
    padding: 0.75rem 1.5rem;
  }

  .btn-primary:hover {
    background-color: #2980b9;
    border-color: #2980b9;
  }

  .page-title {
    text-align: center;
    margin-top: 1rem;
  }
</style>

<div class="container">
  <h1 class="page-title">Edit Post</h1>

  <div class="card">
    <div class="card-body">
      <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" required>
          @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Content</label>
          <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="5" required>{{ old('body', $post->body) }}</textarea>
          @error('body')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
      </form>
    </div>
  </div>

  <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
</div>
@endsection
