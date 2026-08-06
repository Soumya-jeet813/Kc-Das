<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop | KC Das Heritage Sweets</title>
    <link rel="icon" type="images/png" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <nav class="navbar">
        <div class="nav-top">
            <div class="logo">
                <a href="{{url('/')}}"><img src="{{ asset('images/logo.png') }}" alt="KC Das Logo" class="brand-logo"></a>
            </div>
            <div class="nav-utilities">
                <div class="search-container">
                    <input type="text" placeholder="Search sweets..." class="search-input" id="navSearch">
                    <button class="search-btn"><i class="fas fa-search"></i></button>
                </div>
                <div class="nav-account-dropdown">
                    <button class="nav-icon-circle" id="account-trigger">
                        <i class="fas fa-user"></i>
                    </button>
                    <div class="dropdown-menu" id="account-menu">
                        <div class="dropdown-arrow"></div>
                        <ul>
                            <li><a href="{{url('/account')}}"><i class="fas fa-id-card"></i> My Profile</a></li>
                            <li><a href="{{url('/orders')}}"><i class="fas fa-box"></i> My Orders</a></li>
                            <hr>
                            <li><a href="{{url('/login')}}"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="logout-link">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </ul>
                    </div>
                </div>
                <button class="nav-icon-circle cart-trigger" id="cart-btn-nav">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="cart-badge">{{ count((array) session('cart')) }}</span>
                </button>
                <div class="menu-toggle" id="mobile-menu"><span></span><span></span><span></span></div>
            </div>
        </div>
        <div class="nav-bottom">
            <ul class="nav-links">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/shop')}}" style="color: #f5f2e6;">Shop</a></li> 
                <li><a href="{{url('/#pricing')}}">Gifts</a></li>
                <li><a href="{{url('/#gallery')}}">Gallery</a></li>
                <li><a href="{{url('/#contact')}}">Contact</a></li>
            </ul>
        </div>
    </nav>

    @yield('content')

    <a href="https://wa.me/YOUR_NUMBER" class="whatsapp-float" target="_blank"><i class="fab fa-whatsapp"></i></a>
    <button class="cart-float" id="cart-btn">
        <i class="fas fa-shopping-cart"></i>
        <span class="cart-count">{{ count((array) session('cart')) }}</span>
    </button>
    <div class="cart-drawer" id="cart-drawer">
        <div class="cart-header">
            <h3>Your Cart</h3>
            <span class="close-cart" id="close-cart">&times;</span>
        </div>

        <div class="cart-body">
            @if(session('cart') && count(session('cart')) > 0)
                @php $total = 0; @endphp
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity']; @endphp
                    <div class="cart-item">
                        <img src="{{ asset('images/' . $details['image']) }}" alt="{{ $details['name'] }}">
                        <div class="item-details">
                            <p style="margin: 0; font-weight: bold;">{{ $details['name'] }}</p>
                            <div class="quantity-controls" style="display: flex; align-items: center; gap: 10px; margin-top: 5px;">
                                <form action="{{ route('cart.update') }}" method="POST" style="margin:0;">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="hidden" name="quantity" value="-1">
                                    <button type="submit" class="qty-btn"><i class="fas fa-minus"></i></button>
                                </form>

                                <span style="font-weight: bold;">{{ $details['quantity'] }}</span>

                                <form action="{{ route('cart.update') }}" method="POST" style="margin:0;">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="qty-btn"><i class="fas fa-plus"></i></button>
                                </form>
                                
                                <span style="color: #666; margin-left: 10px;">₹{{ $details['price'] * $details['quantity'] }}</span>
                            </div>
                        </div>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}">
                            <button type="submit" class="remove-item"><i class="fas fa-times"></i></button>
                        </form>
                    </div>
                @endforeach
            @else
                <div style="text-align: center; padding: 20px;">
                    <p>Your cart is empty!</p>
                </div>
            @endif
        </div>

        <div class="cart-footer">
            @if(session('cart') && count(session('cart')) > 0)
                <div class="total">Total: <span>₹{{ $total }}</span></div>
                <a href="{{ url('/checkout') }}">
                    <button class="btn" style="width: 100%;">Checkout</button>
                </a>
            @else
                <a href="{{ url('/shop') }}">
                    <button class="btn" style="width: 100%;">Go Shopping</button>
                </a>
            @endif
        </div>
    </div>
    <div class="cart-overlay" id="cart-overlay"></div>

    <footer id="contact" class="footer">
        <div class="footer-container">
            <div class="footer-brand">
                <img src="images/logo.png" alt="KC Das Logo">
                <p>Pure Sweetness Since 1868</p>
            </div>
            <div class="footer-nav">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#about">Heritage</a></li>
                    <li><a href="#services">Online Shop</a></li>
                    <li><a href="#contact">Store Locator</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h3>Contact</h3>
                <p>Bagbazar, Kolkata, WB</p>
                <p>orders@kcdas.co.in</p>
                <div class="socials">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 K.C. Das Private Ltd. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        // --- SHOP LOGIC ---
        let currentCat = 'all';

        function filterCat(e, cat) {
            document.querySelectorAll('.filter-sidebar .tab-btn').forEach(b => b.classList.remove('active'));
            e.target.classList.add('active');
            currentCat = cat;
            applyShopFilters();
        }

        function applyShopFilters() {
            const checks = Array.from(document.querySelectorAll('.shop-check:checked')).map(c => c.value);
            const size = document.getElementById('sizeFilter').value;
            const cards = document.querySelectorAll('.gift-card');

            cards.forEach(card => {
                const tags = card.dataset.tags.split(' ');
                let isVisible = true;

                if (currentCat !== 'all' && card.dataset.cat !== currentCat) isVisible = false;
                if (size !== 'all' && !tags.includes(size)) isVisible = false;
                checks.forEach(c => { if (!tags.includes(c)) isVisible = false; });

                card.style.display = isVisible ? "block" : "none";
            });
        }

        function sortItems(criteria) {
            const grid = document.getElementById('product-grid');
            const cards = Array.from(grid.children);
            cards.sort((a, b) => b.dataset[criteria] - a.dataset[criteria]);
            cards.forEach(c => grid.appendChild(c));
        }

        function sortPrice() {
            const order = document.getElementById('priceSort').value;
            const grid = document.getElementById('product-grid');
            const cards = Array.from(grid.children);
            cards.sort((a, b) => order === 'low' ? a.dataset.price - b.dataset.price : b.dataset.price - a.dataset.price);
            cards.forEach(c => grid.appendChild(c));
        }
        function applyShopFilters() {
        // 1. Get current filter values
        const selectedChecks = Array.from(document.querySelectorAll('.shop-check:checked')).map(c => c.value);
        const selectedSize = document.getElementById('sizeFilter').value;
        const cards = document.querySelectorAll('.gift-card');

        cards.forEach(card => {
            // Retrieve data from the attributes we added in Step 1
            const productCat = card.dataset.cat;
            const productTags = card.dataset.tags ? card.dataset.tags.split(' ') : [];
            
            let isVisible = true;

            // Category Filter
            if (currentCat !== 'all' && productCat !== currentCat) {
                isVisible = false;
            }

            // Pack Size Filter
            if (isVisible && selectedSize !== 'all' && !productTags.includes(selectedSize)) {
                isVisible = false;
            }

            // Special Filters (On Sale / Family Packs)
            if (isVisible) {
                selectedChecks.forEach(check => {
                    if (!productTags.includes(check)) {
                        isVisible = false;
                    }
                });
            }

            // Apply visibility
            card.style.display = isVisible ? "block" : "none";
        });
    }

        // --- HOMEPAGE SCRIPTS (Mobile Menu / Cart) ---
        const menu = document.querySelector('#mobile-menu');
        const navBottom = document.querySelector('.nav-bottom');
        menu.addEventListener('click', () => {
            menu.classList.toggle('active');
            navBottom.classList.toggle('active');
        });

        const cartBtns = document.querySelectorAll('#cart-btn, #cart-btn-nav');
        const cartDrawer = document.getElementById('cart-drawer');
        const cartOverlay = document.getElementById('cart-overlay');
        
        cartBtns.forEach(btn => btn.addEventListener('click', () => {
            cartDrawer.classList.add('active');
            cartOverlay.classList.add('active');
        }));

        document.getElementById('close-cart').addEventListener('click', () => {
            cartDrawer.classList.remove('active');
            cartOverlay.classList.remove('active');
        });
        // Auto-open cart drawer if an item was just added
            @if(session('success'))
                document.getElementById('cart-drawer').classList.add('active');
                document.getElementById('cart-overlay').classList.add('active');
            @endif
    </script>
    @stack('scripts')
</body>
</html>