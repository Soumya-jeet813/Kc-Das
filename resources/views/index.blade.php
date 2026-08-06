@extends('layouts.app')

@section('content')
    <section id="home" class="hero">
        <div class="hero-content">
            <h1>The Original <br><span>Heritage Sweet</span></h1>
            <p>Experience the authentic taste of Bengal's finest spongy Rosogolla, crafted for over 150 years.</p>
            <div class="hero-btns">
                <button class="btn">Order Online</button>
            </div>
        </div>
    </section>

    <section class="feature-bar">
        <div class="feature-item">
            <i class="fas fa-certificate"></i>
            <div class="feature-text">
                <strong>Authentic Taste</strong>
                <span>Since 1868</span>
            </div>
        </div>
        <div class="feature-item">
            <i class="fas fa-leaf"></i>
            <div class="feature-text">
                <strong>Quality Ingredients</strong>
                <span>Pure & Traditional</span>
            </div>
        </div>
        <div class="feature-item">
            <i class="fas fa-shipping-fast"></i>
            <div class="feature-text">
                <strong>Free Shipping</strong>
                <span>Above ₹1000</span>
            </div>
        </div>
        <div class="feature-item">
            <i class="fas fa-tags"></i>
            <div class="feature-text">
                <strong>10% Off</strong>
                <span>Above ₹1499</span>
            </div>
        </div>
        <div class="feature-item">
            <i class="fas fa-box"></i>
            <div class="feature-text">
                <strong>500+ Products</strong>
                <span>Heritage Sweets</span>
            </div>
        </div>
    </section>

    <section id="pricing" class="pricing">
        <h2>Browse by Category</h2>
        
        <div class="tab-container">
            <button class="tab-btn active" onclick="openTab(event, 'sweets')">Sweets</button>
            <button class="tab-btn" onclick="openTab(event, 'diabetic')">Diabetic Friendly</button>
            <button class="tab-btn" onclick="openTab(event, 'snacks')">Snacks</button>
            <button class="tab-btn" onclick="openTab(event, 'doi')">Doi</button>
        </div>

        <div id="sweets" class="tab-content active">
            <div class="pricing-grid">
                <div class="gift-card">
                    <span class="price-tag">₹260</span>
                    <img src="images/Rosogolla.webp" alt="Classic Tin">
                    <h3>Classic Rosogolla</h3>
                    <p>1kg Vacuum Packed</p>
                    <button class="btn-outline">Add to Cart</button>
                </div>
                <div class="gift-card">
                    <span class="price-tag">₹260</span>
                    <img src="images/abarkhabo.webp" alt="Classic Tin">
                    <h3>Abar Khabo</h3>
                    <p>1kg Vacuum Packed</p>
                    <button class="btn-outline">Add to Cart</button>
                </div>
                <div class="gift-card">
                    <span class="price-tag">₹260</span>
                    <img src="images/Butterscotch_720x.webp" alt="Classic Tin">
                    <h3>Butterscotch sandesh</h3>
                    <p>1kg Vacuum Packed</p>
                    <button class="btn-outline">Add to Cart</button>
                </div>
            </div>
        </div>

        <div id="diabetic" class="tab-content">
            <div class="pricing-grid">
                <div class="gift-card">
                    <span class="price-tag">₹300</span>
                    <img src="images/DiabeticRossogolla_720x.jpg" alt="Sugar Free">
                    <h3>Sugar-Free Rosogolla</h3>
                    <p>Stevia Sweetened</p>
                    <button class="btn-outline">Add to Cart</button>
                </div>
                <div class="gift-card">
                    <span class="price-tag">₹300</span>
                    <img src="images/Diabetictalshansh_720x.jpg" alt="Sugar Free">
                    <h3>Sugar-Free Talshansh</h3>
                    <p>Stevia Sweetened</p>
                    <button class="btn-outline">Add to Cart</button>
                </div>
                <div class="gift-card">
                    <span class="price-tag">₹300</span>
                    <img src="images/gulabjamun.webp" alt="Sugar Free">
                    <h3>Sugar-Free Gulabjamun</h3>
                    <p>Stevia Sweetened</p>
                    <button class="btn-outline">Add to Cart</button>
                </div>
            </div>
        </div>

        <div id="snacks" class="tab-content">
            <div class="pricing-grid">
                <div class="gift-card">
                    <span class="price-tag">₹150</span>
                    <img src="images/KoraishutirKochuri_720x.webp" alt="Snacks">
                    <h3>Peas (Koraishutir) Kochuri (4 pcs)</h3>
                    <p>Authentic Bengal Snacks</p>
                    <button class="btn-outline">Add to Cart</button>
                </div>
                <div class="gift-card">
                    <span class="price-tag">₹22</span>
                    <img src="images/samoosa2_2_720x.webp" alt="Snacks">
                    <h3>Singara - Per Pc</h3>
                    <p>Authentic Bengal Snacks</p>
                    <button class="btn-outline">Add to Cart</button>
                </div>
                <div class="gift-card">
                    <span class="price-tag">₹150</span>
                    <img src="images/Chhanarchop_720x.jpg" alt="Snacks">
                    <h3>Radhaballavi Mix</h3>
                    <p>Authentic Bengal Snacks</p>
                    <button class="btn-outline">Add to Cart</button>
                </div>

            </div>
        </div>

        <div id="doi" class="tab-content">
            <div class="pricing-grid">
                <div class="gift-card">
                    <span class="price-tag">₹200</span>
                    <img src="images/MishtiDoi.webp" alt="Doi">
                    <h3>Classic Mishti Doi</h3>
                    <p>Traditional Clay Pot</p>
                    <button class="btn-outline">Add to Cart</button>
                </div>
                <div class="gift-card">
                    <span class="price-tag">₹200</span>
                    <img src="images/Mangodahicup_720x.jpg" alt="Doi">
                    <h3>Mango Doi</h3>
                    <p>Traditional Clay Pot</p>
                    <button class="btn-outline">Add to Cart</button>
                </div>
                <div class="gift-card">
                    <span class="price-tag">₹200</span>
                    <img src="images/WhatsAppImage2021-04-14at20.57.04_720x.webp" alt="Doi">
                    <h3>Kesar Pista Doi</h3>
                    <p>Traditional Clay Pot</p>
                    <button class="btn-outline">Add to Cart</button>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="services">
        <h2>Famous Specialties</h2>
        <div class="unique-grid">
            <div class="sweet-card">
                <div class="blob-img">
                    <img src="images/Rosogolla.webp" alt="Original Rosogolla">
                </div>
                <h3>Original Rosogolla</h3>
                <p>The legendary white spongy balls in syrup that defined a generation.</p>
            </div>
            <div class="sweet-card">
                <div class="blob-img">
                    <img src="images/Rossomalai.webp" alt="Rossomalai">
                </div>
                <h3>Rossomalai</h3>
                <p>Soft chhana patties soaked in thick, saffron-infused creamy milk.</p>
            </div>
            <div class="sweet-card">
                <div class="blob-img">
                    <img src="images/MishtiDoi.webp" alt="Mishti Doi">
                </div>
                <h3>Mishti Doi</h3>
                <p>Classic Bengali sweetened yogurt fermented in traditional clay pots.</p>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <div class="about-container">
            <div class="about-image-wrapper">
                <img src="images/shop1.PNG" alt="Legacy Image" class="main-about-img">
                <div class="floating-badge">Since 1868</div>
            </div>
            <div class="about-content">
                <h2>A Legacy of Taste</h2>
                <ul class="styled-list">
                    <li>Birthplace of original spongy rosogolla.</li>
                    <li>Recipes passed across five generations.</li>
                    <li>National reach through tin-can preservation.</li>
                    <li>A heritage brand built on consumer trust.</li>
                </ul>
            </div>
        </div>
    </section>

    <section id="testimonials" class="testimonials">
        <h2>Celebrity Patrons</h2>
        <div class="modern-grid">
            <div class="celeb-card">
                <img src="images/celebrity1.jpg" alt="Sanjeev Sanyal">
                <h4>Sanjeev Sanyal</h4>
                <p>"Member- Economic Advisory Council to the Prime Minister of India (EAC-PM)."</p>
            </div>
            <div class="celeb-card">
                <img src="images/celebrity2.jpg" alt="Ranveer Singh">
                <h4>Ranveer Singh</h4>
                <p>"Indian actor."</p>
            </div>
            <div class="celeb-card">
                <img src="images/celebrity4.png" alt="Abhishek Bachchan">
                <h4>Abhishek Bachchan</h4>
                <p>"Indian actor and film producer."</p>
            </div>
            <div class="celeb-card">
                <img src="images/celebrity3.jpg" alt="Sanjeev Kapoor">
                <h4>Sanjeev Kapoor</h4>
                <p>"Indian chef and TV show host"</p>
            </div>
        </div>
    </section>

    <section id="gallery" class="gallery">
        <h2>Our Heritage Shops</h2>
        <div class="gallery-masonry">
            <div class="gallery-box" onclick="openLightbox(this)">
                <img src="images/shop1.PNG" alt="Esplanade Outlet">
                <div class="overlay"><span>Esplanade</span></div>
            </div>
            <div class="gallery-box" onclick="openLightbox(this)">
                <img src="images/axismall.webp" alt="Axis Mall Outlet">
                <div class="overlay"><span>Axis Mall</span></div>
            </div>
            <div class="gallery-box" onclick="openLightbox(this)">
                <img src="images/gariahatshop.webp" alt="Gariahat Outlet">
                <div class="overlay"><span>Gariahat</span></div>
            </div>
            <div class="gallery-box" onclick="openLightbox(this)">
                <img src="images/mistihub.webp" alt="Misti Hub Outlet">
                <div class="overlay"><span>Misti Hub</span></div>
            </div>
        </div>
    </section>
   @endsection

@push('scripts')
   @endpush
