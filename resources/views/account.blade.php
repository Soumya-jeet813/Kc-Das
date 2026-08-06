@extends('layouts.app')

@section('content')
     <div class="account-container">
        <aside class="account-nav">
            <ul>
                <li><a href="#" class="active"><i class="fas fa-box"></i> Orders</a></li>
                <li><a href="#"><i class="fas fa-map-marker-alt"></i> Addresses</a></li>
                <li><a href="#"><i class="fas fa-heart"></i> Wishlist</a></li>
                <li><a href="#"><i class="fas fa-user-cog"></i> Profile</a></li>
            </ul>
        </aside>

        <main class="account-content">
            @auth
                <h2 style="font-size: 1.8rem; margin-bottom: 18px;">Welcome back, {{ Auth::user()->name }}!</h2>
            @endauth
            <p style="margin-bottom: 20px; color: #666;">Manage your orders and account settings below.</p>
            
            <h3 style="margin-bottom: 15px; color: var(--primary-color);">Recent Orders</h3>
            <div style="overflow-x: auto;">
                <table class="order-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Order ID">#KCD-9921</td>
                            <td data-label="Date">Oct 12, 2025</td>
                            <td data-label="Status"><span class="status-badge status-delivered">Delivered</span></td>
                            <td data-label="Total">₹520</td>
                            <td data-label="Action"><a href="#" style="color: var(--primary-color);">View</a></td>
                        </tr>
                        <tr>
                            <td data-label="Order ID">#KCD-9955</td>
                            <td data-label="Date">Just Now</td>
                            <td data-label="Status"><span class="status-badge status-pending">Processing</span></td>
                            <td data-label="Total">₹460</td>
                            <td data-label="Action"><a href="#" style="color: var(--primary-color);">View</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
   @endsection

@push('scripts')
   @endpush