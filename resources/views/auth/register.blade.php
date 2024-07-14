@extends('mainLayout')
@section('page-title', 'Account Registration')
@section('custom-styles')
<style>
    body {
        background-color: #f0f2f5; /* Light gray background */
    }
    .card {
        background-color: #fff; /* White card background */
        border: 1px solid #e0e0e0; /* Light gray border */
        border-radius: 5px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }
    .card-header {
        background-color: #3498db; /* Blue header color */
        color: #fff; /* White text color */
        border-bottom: none; /* Remove bottom border */
        text-align: center;
        font-weight: bold;
    }
    .card-body {
        padding: 2.5rem;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .label {
        color: #333; /* Dark gray label color */
        font-weight: normal;
        margin-bottom: 5px;
    }
    .form-control {
        border: 1px solid #ccc; /* Light gray border */
        padding: 0.75rem 1rem;
        border-radius: 3px;
    }
    .btn-primary {
        background-color: #3498db; /* Blue button color */
        color: #fff; /* White text color */
        border-color: #3498db; /* Matching border color */
        border-radius: 3px;
        padding: 0.75rem 1.5rem;
    }
    .btn-primary:hover {
        background-color: #2980b9; /* Darker blue on hover */
        border-color: #2980b9; /* Matching border color on hover */
    }
    .card-footer {
        background-color: #f0f2f5; /* Light gray footer background */
        border-top: none; /* Remove top border */
        text-align: center;
    }
    .card-footer a {
        color: #3498db; /* Blue text color for footer links */
    }
    .card-footer a:hover {
        color: #2980b9; /* Darker blue on hover */
        text-decoration: none;
    }
</style>
@endsection

@section('auth-content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Create Your Account</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label class="label" for="name">Username</label>
                            <input class="form-control" id="name" type="text" name="name" value="{{ old('username') }}" required />
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="label" for="email">Email</label>
                            <input class="form-control" id="email" type="email" name="email" required />
                            <input type="checkbox" name="generate_email" class="ml-2"> Generate
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="label" for="password">Password</label>
                            <input class="form-control" id="password" type="password" name="password" required />
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="label" for="confirm_password">Confirm Password</label>
                            <input class="form-control" id="confirm_password" type="password" name="password_confirmation" required />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="small"><a href="{{ route('login') }}">Already have an account? Login here</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
