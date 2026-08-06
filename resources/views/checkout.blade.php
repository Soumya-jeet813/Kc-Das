@extends('layouts.app')

@section('content')
    <div class="checkout-container">
        {{-- The Main Form Section (Left Side) --}}
        <main class="checkout-form-section">
            <form id="checkout-form" action="{{ route('order.place') }}" method="POST">
                @csrf
                <h3>Shipping Details</h3>
                <div class="form-grid">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" placeholder="John" required value="{{ auth()->user()->name ?? '' }}"required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" placeholder="Doe"required>
                    </div>
                    <div class="form-group full">
                        <label>Street Address</label>
                        <input type="text" name="address" placeholder="House number and street name" required>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city" placeholder="Kolkata" required>
                    </div>
                    <div class="form-group">
                        <label>PIN Code</label>
                        <input type="text" name="pincode" placeholder="700001" required>
                    </div>
                    <div class="form-group full">
                        <label>Phone</label>
                        <input type="tel" name="phone" placeholder="+91" required value="{{ auth()->user()->phone ?? '' }}">
                    </div>
                </div>

                <h3>Payment Method</h3>
                <div class="payment-options">
                    <label style="display: block; margin-bottom: 15px;">
                        <input type="radio" name="payment_method" value="upi" checked> UPI / QR Code (GPay, PhonePe)
                    </label>
                    <label style="display: block; margin-bottom: 15px;">
                        <input type="radio" name="payment_method" value="cod"> Cash on Delivery
                    </label>
                </div>
            </form>
        </main>

        {{-- The Sidebar Section (Right Side) --}}
        <aside class="order-summary">
            <h3 style="margin-bottom: 20px;">Order Summary</h3>
            
            @if(count($cart) > 0)
                @foreach($cart as $id => $details)
                    <div class="summary-item">
                        <span>{{ $details['name'] }} (x{{ $details['quantity'] }})</span>
                        <span>₹{{ $details['price'] * $details['quantity'] }}</span>
                    </div>
                @endforeach
            @else
                <p>Your cart is empty</p>
            @endif

            <div class="summary-item"><span>Subtotal</span><span>₹{{ $total }}</span></div>
            <div class="summary-item"><span>Shipping</span><span style="color: green;">FREE</span></div>
            <div class="summary-total"><span>Total</span><span>₹{{ $total }}</span></div>
            
            <button type="button" id="pay-button" class="btn" style="width: 100%; margin-top: 30px;">Place Order</button>
        </aside>
    </div>
@endsection

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.getElementById('pay-button').onclick = function(e) {
    let form = document.getElementById('checkout-form');

    // CHECK VALIDATION FIRST
    if (!form.checkValidity()) {
        form.reportValidity(); // This shows the "Fill this field" bubbles
        return; // Stops the code from running further
    }

    let method = document.querySelector('input[name="payment_method"]:checked').value;
    
    if (method === 'upi') {
        // ... your Razorpay code ...
    } else {
        form.submit();
    }
}
</script>
@endpush