@extends('mainLayout')
@section('page-title', 'Account Login')
@section('custom-styles')
<style>
    body {
        background-color: #343a40; /* Light yellow background */
    }
    .navbar {
        background-color: #ffd700 !important; /* Yellow navbar */
    }
    .navbar .nav-link,
    .navbar .navbar-brand {
        color: #343a40 !important; /* Dark grey text color for navbar items */
    }
    .navbar .nav-link:hover {
        color: #6c757d !important; /* Complementary color for navbar items on hover */
    }
    .card-header {
        background-color: #ffd700; /* Gold color for the card header */
        color: #343a40; /* Dark grey text color */
    }
    .btn-primary {
        background-color: #ffd700; /* Gold color for the button */
        border-color: #ffd700; /* Matching border color */
    }
    .btn-primary:hover {
        background-color: #ffdf00; /* Slightly darker gold on hover */
        border-color: #ffdf00; /* Matching border color on hover */
    }
</style>
@endsection
@section('auth-content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header text-center">
                    <h3 class="mb-0">Account Login</h3>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center bg-light">
                    <a href="{{ route('register') }}" class="text-decoration-none">Don't have an account? Register here</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
