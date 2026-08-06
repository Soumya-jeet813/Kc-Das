@extends('layouts.app')

@section('content')
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2>Member Login</h2>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" placeholder="Your registered email" name= "email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" placeholder="••••••••" name="password" required>
                </div>
                <button type="submit" class="auth-btn">Access Account</button>
            </form>
            <div class="auth-footer">
                <p>Don't have an account? <a href="{{route('register')}}">Register Now</a></p>
            </div>
        </div>
    </div>
   @endsection

@push('scripts')
   @endpush
