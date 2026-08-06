@extends('layouts.app')

@section('content')
<div style="text-align: center; padding: 100px 20px; background: #fdfaf5;">
    <div style="background: white; max-width: 600px; margin: 0 auto; padding: 50px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
        
        <div style="font-size: 80px; color: #4CAF50; margin-bottom: 20px;">
            <i class="fas fa-check-circle"></i>
        </div>
        
        <h1 style="color: #800000; margin-bottom: 10px;">Order Placed Successfully!</h1>
        <p style="color: #666; font-size: 18px;">Thank you for your order. Your sweets are being prepared!</p>
        
        <div style="background: #f9f9f9; padding: 20px; margin: 30px 0; border-radius: 10px; border: 1px dashed #ddd;">
            <p style="margin: 0; color: #333;">Order ID: <strong>#{{ $order->id }}</strong></p>
            <p style="margin: 5px 0 0; color: #333;">Total Amount: <strong>₹{{ $order->amount }}</strong></p>
        </div>

        <div style="display: flex; gap: 15px; justify-content: center;">
            <a href="{{ url('/shop') }}" class="btn" style="text-decoration: none;" >Continue Shopping</a>
            <a href="{{ url('/account') }}" class="btn-outline" style="text-decoration: none;">Track Order</a>
        </div>
    </div>
</div>
@endsection