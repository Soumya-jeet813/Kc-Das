@extends('layouts.app')

@section('content')
<div class="shop-container">
        <aside class="filter-sidebar">
            <div class="filter-group">
                <h4>Categories</h4>
                <button class="tab-btn active" style="width:100%; text-align:left; margin-bottom:5px;" onclick="filterCat(event, 'all')">All Products</button>
                <button class="tab-btn" style="width:100%; text-align:left; margin-bottom:5px;" onclick="filterCat(event, 'Classic Sweets')">Classic Sweets</button>
                <button class="tab-btn" style="width:100%; text-align:left; margin-bottom:5px;" onclick="filterCat(event, 'Diabetic Friendly')">Diabetic Friendly</button>
                <button class="tab-btn" style="width:100%; text-align:left;" onclick="filterCat(event, 'Snacks')">Snacks</button>
            </div>

            <div class="filter-group">
                <h4>Special Filters</h4>
                <label style="display:block; margin-bottom:10px;"><input type="checkbox" class="shop-check" value="sale" onchange="applyShopFilters()"> On Sale</label>
                <label style="display:block; margin-bottom:10px;"><input type="checkbox" class="shop-check" value="bulk" onchange="applyShopFilters()"> Family Packs</label>
            </div>

            <div class="filter-group">
                <h4>Pack Size</h4>
                <select id="sizeFilter" onchange="applyShopFilters()" style="width:100%; padding:8px; border-radius:5px;">
                    <option value="all">All Sizes</option>
                    <option value="single">Single (Pc)</option>
                    <option value="tin">Heritage Tin (1kg)</option>
                </select>
            </div>
        </aside>

        <main>
            <div class="shop-content-header">
                <div class="sort-links">
                    <strong>Sort:</strong>
                    <button class="tab-btn active" onclick="sortItems('pop')">Popularity</button>
                    <button class="tab-btn" onclick="sortItems('rate')">Rating</button>
                    <button class="tab-btn" onclick="sortItems('date')">Latest</button>
                </div>
                <select id="priceSort" onchange="sortPrice()" style="padding:5px; border-radius:5px;">
                    <option value="none">Price</option>
                    <option value="low">Low to High</option>
                    <option value="high">High to Low</option>
                </select>
            </div>

            <div class="pricing-grid" id="product-grid">
            @foreach($products as $product)
                <div class="gift-card" 
                    data-cat="{{ $product->category }}" 
                    data-tags="{{ $product->pack_size }} {{ $product->is_on_sale ? 'sale' : '' }} {{ $product->is_family_pack ? 'bulk' : '' }}"
                    data-pop="{{ $product->popularity_score ?? 0 }}"
                    data-rate="{{ $product->rating ?? 0 }}"
                    data-date="{{ $product->created_at->timestamp }}"
                    data-price="{{ $product->price }}">
                    
                    <span class="price-tag">₹{{ $product->price }}</span>
                    
                    <a href="{{ route('product.show', $product->id) }}">
                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                    </a>
                    
                    <h3>
                        <a href="{{ route('product.show', $product->id) }}" style="text-decoration: none; color: inherit;">
                            {{ $product->name }}
                        </a>
                    </h3>
                    
                    <p>{{ $product->description }}</p>
                    
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn-outline">Add to Cart</button>
                    </form>
                </div>
                @endforeach
            </div>
        </main>
    </div>
   @endsection

@push('scripts')
   @endpush

