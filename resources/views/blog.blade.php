<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>/* Enhanced Sidebar Styles */
        .enhanced-sidebar {
            position: fixed;
            top: 0;
            width: 350px;
            height: 100%;
            background: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            overflow-y: auto;
            transition: transform 0.3s ease-in-out;
            padding: 30px;
        }
        
        .cart-sidebar {
            right: 0;
            transform: translateX(100%);
        }
        
        .wishlist-sidebar {
            left: 0;
            transform: translateX(-100%);
        }
        
        .enhanced-sidebar.active {
            transform: translateX(0);
        }
        
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9998;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease-in-out;
        }
        
        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e5e5;
        }
        
        .sidebar-title {
            font-size: 20px;
            font-weight: 700;
            color: #111;
            margin: 0;
        }
        
        .close-sidebar {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #999;
            transition: color 0.3s;
        }
        
        .close-sidebar:hover {
            color: #111;
        }
        
        .product-info {
            display: flex;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e5e5e5;
        }
        
        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin-right: 15px;
        }
        
        .product-details {
            flex: 1;
        }
        
        .product-name {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .product-price {
            color: #e53637;
            font-weight: 700;
            font-size: 16px;
        }
        
        .quantity-selector {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        
        .quantity-label {
            margin-right: 15px;
            font-weight: 600;
        }
        
        .quantity-controls {
            display: flex;
            align-items: center;
            border: 1px solid #e5e5e5;
            border-radius: 4px;
            overflow: hidden;
        }
        
        .quantity-btn {
            background: #f5f5f5;
            border: none;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .quantity-btn:hover {
            background: #e5e5e5;
        }
        
        .quantity-input {
            width: 50px;
            height: 36px;
            border: none;
            text-align: center;
            font-weight: 600;
            background: #fff;
        }
        
        .sidebar-actions {
            margin-top: 25px;
        }
        
        .btn-primary {
            background: #111;
            color: #fff;
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s;
            margin-bottom: 10px;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        
        .btn-primary:hover {
            background: #333;
        }
        
        .btn-secondary {
            background: transparent;
            color: #111;
            border: 1px solid #e5e5e5;
            padding: 12px 30px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s;
        }
        
        .btn-secondary:hover {
            background: #f5f5f5;
        }
        
        .wishlist-item {
            display: flex;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e5e5e5;
        }
        
        .wishlist-actions {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        
        .wishlist-actions .btn-primary {
            flex: 1;
            padding: 8px 15px;
            font-size: 14px;
        }
        
        .empty-state {
            text-align: center;
            padding: 30px 0;
            color: #999;
        }
        
        .empty-state i {
            font-size: 48px;
            margin-bottom: 15px;
            display: block;
        }
        
        /* Enhanced product buttons */
        .enhanced-product-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        
        .enhanced-add-cart, .enhanced-add-wishlist {
            flex: 1;
            background: #111;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            border-radius: 4px;
        }
        
        .enhanced-add-wishlist {
            background: transparent;
            color: #111;
            border: 1px solid #e5e5e5;
        }
        
        .enhanced-add-cart:hover {
            background: #333;
        }
        
        .enhanced-add-wishlist:hover {
            background: #f5f5f5;
        }
        
        /* Hover Wishlist Icon */
        .product__item__pic {
            position: relative;
        }
        
        .hover-wishlist-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.9);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .product__item:hover .hover-wishlist-icon {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .hover-wishlist-icon.active {
            color: #e53637;
        }
        
        .hover-wishlist-icon i {
            font-size: 18px;
        }
        
        /* Product Detail Modal */
        .product-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .product-modal.active {
            opacity: 1;
            visibility: visible;
        }
        
        .modal-content {
            background: #fff;
            width: 90%;
            max-width: 1000px;
            max-height: 90vh;
            overflow-y: auto;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            position: relative;
            animation: modalFadeIn 0.4s ease;
        }
        
        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .close-modal {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.1);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: background 0.3s;
        }
        
        .close-modal:hover {
            background: rgba(0, 0, 0, 0.2);
        }
        
        .modal-body {
            display: flex;
            flex-wrap: wrap;
        }
        
        .modal-image {
            flex: 1;
            min-width: 300px;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .modal-image img {
            max-width: 100%;
            border-radius: 8px;
        }
        
        .modal-details {
            flex: 1;
            min-width: 300px;
            padding: 30px;
            background: #f9f9f9;
            border-radius: 0 10px 10px 0;
        }
        
        .modal-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #111;
        }
        
        .modal-price {
            font-size: 22px;
            color: #e53637;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .modal-description {
            margin-bottom: 25px;
            line-height: 1.6;
            color: #666;
        }
        
        .modal-features {
            margin-bottom: 25px;
        }
        
        .modal-features ul {
            list-style: none;
            padding: 0;
        }
        
        .modal-features li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
            display: flex;
        }
        
        .modal-features li:last-child {
            border-bottom: none;
        }
        
        .feature-label {
            font-weight: 600;
            width: 120px;
            color: #333;
        }
        
        .feature-value {
            color: #666;
        }
        
        .modal-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .modal-actions .btn-primary {
            flex: 2;
        }
        
        .modal-actions .btn-secondary {
            flex: 1;
        }
        
        /* Navbar icon updates */
        .header__nav__option a {
            position: relative;
        }
        
        .cart-count, .wishlist-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #e53637;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Search Results Styles */
        .search-results-container {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            max-height: 400px;
            overflow-y: auto;
            z-index: 1001;
            display: none;
            margin-top: 10px;
        }
        
        .search-result-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: background 0.3s;
        }
        
        .search-result-item:hover {
            background: #f8f9fa;
        }
        
        .search-result-item img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            margin-right: 15px;
            border-radius: 4px;
        }
        
        .search-result-info {
            flex: 1;
        }
        
        .search-result-name {
            font-weight: 600;
            margin-bottom: 5px;
            color: #111;
        }
        
        .search-result-price {
            color: #e53637;
            font-weight: 700;
        }
        
        .no-results {
            padding: 20px;
            text-align: center;
            color: #999;
        }
        
        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .enhanced-sidebar {
                width: 100%;
            }
            
            .modal-body {
                flex-direction: column;
            }
            
            .modal-details {
                border-radius: 0 0 10px 10px;
            }
        }
    
.header__nav__option {
    display: flex;
    align-items: center;
    gap: 15px;
}

.header__nav__option a {
    color: #333;
    text-decoration: none;
    font-size: 18px;
    position: relative;
    display: flex;
    align-items: center;
}

.header__nav__option a:hover {
    color: #667eea;
}

.wishlist-count, .cart-count {
    position: absolute;
    top: -8px;
    right: -8px;
    background: #ff4d4f;
    color: white;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    font-size: 11px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

.profile-icon-nav {
    margin-left: 5px;
}
</style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
   <!-- Add to Cart Sidebar -->
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay"></div>
    
    <!-- Add to Cart Sidebar -->
    <div class="enhanced-sidebar cart-sidebar">
        <div class="sidebar-header">
            <h3 class="sidebar-title">Your Cart <span class="cart-count">0</span></h3>
            <button class="close-sidebar">&times;</button>
        </div>
        <div class="sidebar-content">
            <div class="empty-state">
                <i class="fa fa-shopping-cart"></i>
                <p>Your cart is empty</p>
            </div>
        </div>
    </div>
    
    <!-- Add to Wishlist Sidebar -->
    <div class="enhanced-sidebar wishlist-sidebar">
        <div class="sidebar-header">
            <h3 class="sidebar-title">Your Wishlist <span class="wishlist-count">0</span></h3>
            <button class="close-sidebar">&times;</button>
        </div>
        <div class="sidebar-content">
            <div class="empty-state">
                <i class="fa fa-heart-o"></i>
                <p>Your wishlist is empty</p>
            </div>
        </div>
    </div>
    
    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
            <a href="#"><img src="img/icon/heart.png" alt=""></a>
            <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Free shipping, 30-day return or refund guarantee.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        @auth
                            <div class="header__top__links">
                                <a href="{{ route('profile.show') }}">My Profile</a>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @else
                            <div class="header__top__links">
                                <a href="{{ route('login') }}">Sign in</a>
                                <a href="#">FAQs</a>
                            </div>
                        @endauth
                        <div class="header__top__hover">
                            <span>Usd <i class="arrow_carrot-down"></i></span>
                            <ul>
                                <li>USD</li>
                                <li>EUR</li>
                                <li>USD</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <div class="header__logo">
                <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="Logo"></a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <nav class="header__menu mobile-menu">
                <ul>
                    <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                    <li class="{{ request()->is('shop') ? 'active' : '' }}"><a href="{{ route('shop') }}">Shop</a></li>
                    <li class="{{ request()->is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About</a></li>
                    <li class="{{ request()->is('blog') ? 'active' : '' }}"><a href="{{ route('blog') }}">Blog</a></li>
                    <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contacts</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="header__nav__option">
                <a href="#" class="search-switch"><i class="fas fa-search"></i></a>
                <a href="{{ route('wishlist') }}" class="wishlist-icon-nav">
                    <i class="fas fa-heart"></i>
                    <span class="wishlist-count">{{ auth()->check() ? auth()->user()->wishlistItems()->count() : 0 }}</span>
                </a>
                <a href="{{ route('cart') }}" class="cart-icon-nav">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">{{ auth()->check() ? auth()->user()->cartItems()->count() : 0 }}</span>
                </a>
                <a href="{{ route('profile.show') }}" class="profile-icon-nav">
                    <i class="fas fa-user"></i>
                </a>
                <div class="price">$0.00</div>
            </div>
        </div>
    </div>
    <div class="canvas__open"><i class="fa fa-bars"></i></div>
</div>
</header>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Our Blog</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-1.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 16 February 2020</span>
                            <h5>What Curling Irons Are The Best Ones</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-2.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 21 February 2020</span>
                            <h5>Eternity Bands Do Last Forever</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-3.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 28 February 2020</span>
                            <h5>The Health Benefits Of Sunglasses</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-4.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 16 February 2020</span>
                            <h5>Aiming For Higher The Mastopexy</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-5.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 21 February 2020</span>
                            <h5>Wedding Rings A Gift For A Lifetime</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-6.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 28 February 2020</span>
                            <h5>The Different Methods Of Hair Removal</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-7.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 16 February 2020</span>
                            <h5>Hoop Earrings A Style From History</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-8.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 21 February 2020</span>
                            <h5>Lasik Eye Surgery Are You Ready</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-9.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 28 February 2020</span>
                            <h5>Lasik Eye Surgery Are You Ready</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2020
                            All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
      <script>
        // Enhanced Sidebar Functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Get elements
            const cartSidebar = document.querySelector('.cart-sidebar');
            const wishlistSidebar = document.querySelector('.wishlist-sidebar');
            const overlay = document.querySelector('.sidebar-overlay');
            const closeButtons = document.querySelectorAll('.close-sidebar');
            const addCartButtons = document.querySelectorAll('.enhanced-add-cart');
            const addWishlistButtons = document.querySelectorAll('.enhanced-add-wishlist');
            const hoverWishlistIcons = document.querySelectorAll('.hover-wishlist-icon');
            const productItems = document.querySelectorAll('.product__item');
            const productModal = document.querySelector('.product-modal');
            const closeModal = document.querySelector('.close-modal');
            const cartIconNav = document.querySelectorAll('.cart-icon-nav');
            const wishlistIconNav = document.querySelectorAll('.wishlist-icon-nav');
            
            // Data storage
            let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            let wishlistItems = JSON.parse(localStorage.getItem('wishlistItems')) || [];
            
            // Save to localStorage
            function saveCartToStorage() {
                localStorage.setItem('cartItems', JSON.stringify(cartItems));
            }
            
            function saveWishlistToStorage() {
                localStorage.setItem('wishlistItems', JSON.stringify(wishlistItems));
            }
            
            // Open cart sidebar
            function openCartSidebar() {
                cartSidebar.classList.add('active');
                overlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
            
            // Open wishlist sidebar
            function openWishlistSidebar() {
                wishlistSidebar.classList.add('active');
                overlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
            
            // Close sidebars
            function closeSidebars() {
                cartSidebar.classList.remove('active');
                wishlistSidebar.classList.remove('active');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
            
            // Open product modal
            function openProductModal(productCard) {
                const productName = productCard.querySelector('h6').textContent;
                const productPrice = productCard.querySelector('h5').textContent;
                const productImage = productCard.querySelector('.set-bg').getAttribute('data-setbg');
                
                // Set modal content
                document.getElementById('modal-product-name').textContent = productName;
                document.getElementById('modal-product-price').textContent = productPrice;
                document.getElementById('modal-product-image').src = productImage;
                
                // Show modal
                productModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
            
            // Close modal
            function closeModalFunc() {
                productModal.classList.remove('active');
                document.body.style.overflow = '';
            }
            
            // Add to cart
            function addToCart(productCard) {
                const productName = productCard.querySelector('h6').textContent;
                const productPrice = productCard.querySelector('h5').textContent;
                const productImage = productCard.querySelector('.set-bg').getAttribute('data-setbg');
                
                // Add to cart items
                cartItems.push({
                    name: productName,
                    price: productPrice,
                    image: productImage,
                    quantity: 1,
                    id: Date.now() // Add unique ID
                });
                
                // Update cart count
                updateCartCount();
                
                // Update cart sidebar
                updateCartSidebar();
                
                // Save to localStorage
                saveCartToStorage();
                
                // Open cart sidebar
                openCartSidebar();
            }
            
            // Add to wishlist
            function addToWishlist(productCard) {
                const productName = productCard.querySelector('h6').textContent;
                const productPrice = productCard.querySelector('h5').textContent;
                const productImage = productCard.querySelector('.set-bg').getAttribute('data-setbg');
                
                // Add to wishlist items
                wishlistItems.push({
                    name: productName,
                    price: productPrice,
                    image: productImage,
                    id: Date.now() // Add unique ID
                });
                
                // Update wishlist count
                updateWishlistCount();
                
                // Update wishlist sidebar
                updateWishlistSidebar();
                
                // Save to localStorage
                saveWishlistToStorage();
                
                // Open wishlist sidebar
                openWishlistSidebar();
            }
            
            // Update cart count
            function updateCartCount() {
                const cartCount = document.querySelectorAll('.cart-count');
                cartCount.forEach(count => {
                    count.textContent = cartItems.length;
                });
            }
            
            // Update wishlist count
            function updateWishlistCount() {
                const wishlistCount = document.querySelectorAll('.wishlist-count');
                wishlistCount.forEach(count => {
                    count.textContent = wishlistItems.length;
                });
            }
            
            // Update cart sidebar
            function updateCartSidebar() {
                const sidebarContent = cartSidebar.querySelector('.sidebar-content');
                
                if (cartItems.length === 0) {
                    sidebarContent.innerHTML = `
                        <div class="empty-state">
                            <i class="fa fa-shopping-cart"></i>
                            <p>Your cart is empty</p>
                        </div>
                    `;
                } else {
                    let itemsHTML = '';
                    cartItems.forEach(item => {
                        itemsHTML += `
                            <div class="product-info">
                                <img src="${item.image}" alt="Product" class="product-image">
                                <div class="product-details">
                                    <h4 class="product-name">${item.name}</h4>
                                    <div class="product-price">${item.price}</div>
                                    <div class="quantity-selector">
                                        <span class="quantity-label">Quantity:</span>
                                        <div class="quantity-controls">
                                            <button class="quantity-btn minus">-</button>
                                            <input type="text" class="quantity-input" value="${item.quantity}" readonly>
                                            <button class="quantity-btn plus">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                    
                    itemsHTML += `
                        <div class="sidebar-actions">
                            <a href="/checkout" class="btn-primary">Proceed to Checkout</a>
                            <button class="btn-secondary" onclick="closeSidebars()">Continue Shopping</button>
                        </div>
                    `;
                    
                    sidebarContent.innerHTML = itemsHTML;
                    
                    // Add event listeners for quantity buttons
                    const minusButtons = sidebarContent.querySelectorAll('.quantity-btn.minus');
                    const plusButtons = sidebarContent.querySelectorAll('.quantity-btn.plus');
                    
                    minusButtons.forEach((btn, index) => {
                        btn.addEventListener('click', function() {
                            if (cartItems[index].quantity > 1) {
                                cartItems[index].quantity--;
                                updateCartSidebar();
                                saveCartToStorage();
                            }
                        });
                    });
                    
                    plusButtons.forEach((btn, index) => {
                        btn.addEventListener('click', function() {
                            cartItems[index].quantity++;
                            updateCartSidebar();
                            saveCartToStorage();
                        });
                    });
                }
            }
            
            // Update wishlist sidebar
            function updateWishlistSidebar() {
                const sidebarContent = wishlistSidebar.querySelector('.sidebar-content');
                
                if (wishlistItems.length === 0) {
                    sidebarContent.innerHTML = `
                        <div class="empty-state">
                            <i class="fa fa-heart-o"></i>
                            <p>Your wishlist is empty</p>
                        </div>
                    `;
                } else {
                    let itemsHTML = '';
                    wishlistItems.forEach((item, index) => {
                        itemsHTML += `
                            <div class="wishlist-item">
                                <img src="${item.image}" alt="Product" class="product-image">
                                <div class="product-details">
                                    <h4 class="product-name">${item.name}</h4>
                                    <div class="product-price">${item.price}</div>
                                    <div class="wishlist-actions">
                                        <button class="btn-primary add-to-cart-from-wishlist">Add to Cart</button>
                                        <button class="btn-secondary remove-from-wishlist" data-index="${index}">Remove</button>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                    
                    sidebarContent.innerHTML = itemsHTML;
                    
                    // Add event listeners for wishlist actions
                    const addToCartButtons = sidebarContent.querySelectorAll('.add-to-cart-from-wishlist');
                    const removeButtons = sidebarContent.querySelectorAll('.remove-from-wishlist');
                    
                    addToCartButtons.forEach((btn, index) => {
                        btn.addEventListener('click', function() {
                            // Add item to cart
                            cartItems.push({
                                ...wishlistItems[index],
                                quantity: 1,
                                id: Date.now()
                            });
                            updateCartCount();
                            updateCartSidebar();
                            saveCartToStorage();
                            alert('Item added to cart!');
                        });
                    });
                    
                    removeButtons.forEach(btn => {
                        btn.addEventListener('click', function() {
                            const index = this.getAttribute('data-index');
                            wishlistItems.splice(index, 1);
                            updateWishlistCount();
                            updateWishlistSidebar();
                            saveWishlistToStorage();
                        });
                    });
                }
            }
            
            // Search functionality
            const searchInput = document.getElementById('search-input');
            const searchResults = document.getElementById('search-results');
            const searchModel = document.querySelector('.search-model');
            const searchCloseSwitch = document.querySelector('.search-close-switch');
            
            // Sample product data
            const products = [
                {
                    name: "Piqué Biker Jacket",
                    price: "$67.24",
                    image: "img/product/product-1.jpg",
                    category: "Jackets"
                },
                {
                    name: "Piqué Biker Jacket",
                    price: "$67.24",
                    image: "img/product/product-2.jpg",
                    category: "Jackets"
                },
                {
                    name: "Multi-pocket Chest Bag",
                    price: "$43.48",
                    image: "img/product/product-3.jpg",
                    category: "Bags"
                },
                {
                    name: "Diagonal Textured Cap",
                    price: "$60.9",
                    image: "img/product/product-4.jpg",
                    category: "Accessories"
                },
                {
                    name: "Lether Backpack",
                    price: "$31.37",
                    image: "img/product/product-5.jpg",
                    category: "Bags"
                },
                {
                    name: "Ankle Boots",
                    price: "$98.49",
                    image: "img/product/product-6.jpg",
                    category: "Shoes"
                },
                {
                    name: "T-shirt Contrast Pocket",
                    price: "$49.66",
                    image: "img/product/product-7.jpg",
                    category: "Clothing"
                },
                {
                    name: "Basic Flowing Scarf",
                    price: "$26.28",
                    image: "img/product/product-8.jpg",
                    category: "Accessories"
                }
            ];
            
            // Show search model
            document.querySelectorAll('.search-switch').forEach(icon => {
                icon.addEventListener('click', function(e) {
                    e.preventDefault();
                    searchModel.style.display = 'block';
                    document.body.style.overflow = 'hidden';
                    setTimeout(() => {
                        searchInput.focus();
                    }, 100);
                });
            });
            
            // Close search model
            searchCloseSwitch.addEventListener('click', function() {
                searchModel.style.display = 'none';
                document.body.style.overflow = '';
                searchResults.style.display = 'none';
                searchInput.value = '';
            });
            
            // Search function
            function performSearch(query) {
                if (!query.trim()) {
                    searchResults.style.display = 'none';
                    return;
                }
                
                const filteredProducts = products.filter(product => 
                    product.name.toLowerCase().includes(query.toLowerCase()) ||
                    product.category.toLowerCase().includes(query.toLowerCase())
                );
                
                displaySearchResults(filteredProducts);
            }
            
            // Display search results
            function displaySearchResults(results) {
                searchResults.innerHTML = '';
                
                if (results.length === 0) {
                    searchResults.innerHTML = '<div class="no-results">No products found</div>';
                    searchResults.style.display = 'block';
                    return;
                }
                
                results.forEach(product => {
                    const resultItem = document.createElement('div');
                    resultItem.className = 'search-result-item';
                    resultItem.innerHTML = `
                        <img src="${product.image}" alt="${product.name}">
                        <div class="search-result-info">
                            <div class="search-result-name">${product.name}</div>
                            <div class="search-result-price">${product.price}</div>
                        </div>
                    `;
                    
                    resultItem.addEventListener('click', function() {
                        // Find and click the corresponding product
                        const productCards = document.querySelectorAll('.product__item');
                        productCards.forEach(card => {
                            if (card.querySelector('h6').textContent === product.name) {
                                card.click();
                            }
                        });
                        searchModel.style.display = 'none';
                        document.body.style.overflow = '';
                        searchResults.style.display = 'none';
                        searchInput.value = '';
                    });
                    
                    searchResults.appendChild(resultItem);
                });
                
                searchResults.style.display = 'block';
            }
            
            // Event Listeners
            
            // Add to cart buttons
            addCartButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const productCard = this.closest('.product__item');
                    addToCart(productCard);
                });
            });
            
            // Add to wishlist buttons
            addWishlistButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const productCard = this.closest('.product__item');
                    addToWishlist(productCard);
                });
            });
            
            // Hover wishlist icons
            hoverWishlistIcons.forEach(icon => {
                icon.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const productCard = this.closest('.product__item');
                    addToWishlist(productCard);
                    
                    // Visual feedback
                    this.classList.add('active');
                    this.innerHTML = '<i class="fa fa-heart"></i>';
                });
            });
            
            // Product card click for modal
            productItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    // Only open modal if not clicking on buttons or icons
                    if (!e.target.closest('.enhanced-add-cart') && 
                        !e.target.closest('.enhanced-add-wishlist') && 
                        !e.target.closest('.hover-wishlist-icon') &&
                        !e.target.closest('.product__hover')) {
                        openProductModal(this);
                    }
                });
            });
            
            // Navbar icon clicks
            cartIconNav.forEach(icon => {
                icon.addEventListener('click', function(e) {
                    e.preventDefault();
                    openCartSidebar();
                });
            });
            
            wishlistIconNav.forEach(icon => {
                icon.addEventListener('click', function(e) {
                    e.preventDefault();
                    openWishlistSidebar();
                });
            });
            
            // Search event listeners
            searchInput.addEventListener('input', function() {
                performSearch(this.value);
            });
            
            // Hide results when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.search-model-form')) {
                    searchResults.style.display = 'none';
                }
            });
            
            // Close sidebars
            overlay.addEventListener('click', closeSidebars);
            
            closeButtons.forEach(button => {
                button.addEventListener('click', closeSidebars);
            });
            
            // Close modal
            closeModal.addEventListener('click', closeModalFunc);
            
            // Close modal on overlay click
            productModal.addEventListener('click', function(e) {
                if (e.target === productModal) {
                    closeModalFunc();
                }
            });
            
            // Modal add to cart button
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('modal-add-cart')) {
                    const productCard = document.querySelector('.product__item');
                    addToCart(productCard);
                    closeModalFunc();
                }
                
                if (e.target.classList.contains('modal-add-wishlist')) {
                    const productCard = document.querySelector('.product__item');
                    addToWishlist(productCard);
                    closeModalFunc();
                }
            });
            
            // Close on Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeSidebars();
                    closeModalFunc();
                    searchModel.style.display = 'none';
                    document.body.style.overflow = '';
                    searchResults.style.display = 'none';
                }
            });
            
            // Initialize
            updateCartCount();
            updateWishlistCount();
            updateCartSidebar();
            updateWishlistSidebar();
        });
    </script>
</body>

</html>