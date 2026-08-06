@extends('layouts.app')

@section('content')
<div class="product-single-container" style="max-width: 1200px; margin: 40px auto; padding: 20px; display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: start;">
    
    <div class="product-image-box">
        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" 
             style="width: 100%; border-radius: 12px; box-shadow: 0 8px 25px rgba(0,0,0,0.1); border: 1px solid #eee;">
    </div>

    <div class="product-details">
        <nav style="margin-bottom: 15px; font-size: 0.85rem; color: #777;">
            <a href="{{ url('/shop') }}" style="color: #5d4037; text-decoration: none;">Shop</a> 
            <i class="fas fa-chevron-right" style="font-size: 0.7rem; margin: 0 8px;"></i> 
            {{ ucfirst($product->category) }}
        </nav>

        <h1 style="font-size: 2.2rem; color: #5d4037; margin-bottom: 8px; font-family: serif;">{{ $product->name }}</h1>
        
        <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 25px;">
            <span style="font-size: 1.8rem; font-weight: bold; color: #b22222;">₹{{ number_format($product->price, 0) }}</span>
            <div style="background: #fdfaf0; padding: 4px 12px; border-radius: 15px; border: 1px solid #d4c4a8; font-size: 0.85rem; color: #5d4037;">
                <i class="fas fa-star" style="color: #ffc107;"></i> {{ $product->rating }}
            </div>
        </div>

        <p style="line-height: 1.7; color: #444; margin-bottom: 30px; font-size: 1.05rem;">
            {{ $product->description ?? 'Traditional heritage sweets from the house of K.C. Das, crafted with the finest ingredients and a legacy dating back to 1868.' }}
        </p>

        <div style="margin-bottom: 30px; border-top: 1px solid #eee; border-bottom: 1px solid #eee; padding: 20px 0;">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                <i class="fas fa-box" style="color: #5d4037; width: 20px;"></i>
                <strong>Pack Size:</strong> {{ ucfirst($product->pack_size) }}
            </div>
            <div style="display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-check-circle" style="color: #28a745; width: 20px;"></i>
                <strong>Availability:</strong> In Stock
            </div>
        </div>

        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="btn" style="width: 100%; padding: 15px; font-size: 1.1rem; border-radius: 8px;">
                <i class="fas fa-shopping-bag" style="margin-right: 10px;"></i> Add to Cart
            </button>
        </form>

        <div style="margin-top: 30px;">
            <p style="font-size: 0.8rem; color: #999; margin-bottom: 10px; text-transform: uppercase;">Share this product</p>
            <div style="display: flex; gap: 15px;">
                <a href="#" style="color: #5d4037;"><i class="fab fa-facebook-f"></i></a>
                <a href="#" style="color: #5d4037;"><i class="fab fa-instagram"></i></a>
                <a href="#" style="color: #5d4037;"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection