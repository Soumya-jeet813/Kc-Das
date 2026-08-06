@extends('layouts.app')

@section('content')
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2>Create New Account</h2>
            </div>
             @if ($errors->any())
                    <div style="color: red; grid-column: span 2;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form method="POST" action="{{ route('register') }}" class="form-grid">
                @csrf
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" placeholder="e.g. Anirban" name="name" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" placeholder="e.g. Das" name="last_name" required>
                </div>
                <div class="form-group full">
                    <label>Email Address</label>
                    <input type="email" placeholder="email@example.com" name="email" required>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" placeholder="+91" name="phone" required>
                </div>
                <div class="form-group">
                    <label>Create Password</label>
                    <input type="password" name="password" placeholder="Min. 8 characters" required>
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Repeat password" required>
                </div>
                <div class="form-group full">
                    <button type="submit" class="auth-btn">Register Heritage Membership</button>
                </div>
            </form>
            <div style="text-align: center; margin-top: 30px;">
                <p>Already have an account? <a href="{{url('login')}}" style="color: var(--primary-color); font-weight: bold;">Login Here</a></p>
            </div>
        </div>
    </div>
   @endsection

@push('scripts')
   @endpush
