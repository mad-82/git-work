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
    
    <style>
        /* Enhanced Sidebar Styles */
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
        
        /* Filtering and Pagination Styles */
        .filter-active {
            color: #e53637;
            font-weight: bold;
        }
        
        .pagination-active {
            background: #111;
            color: white;
        }
        
        /* FIXED: Product Image Styles */
        .product__item__pic {
            height: 300px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }
        
        .set-bg {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        /* Fix for product hover icons */
        .product__hover {
            position: absolute;
            right: 15px;
            bottom: 15px;
            list-style: none;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
        }
        
        .product__item:hover .product__hover {
            opacity: 1;
            visibility: visible;
        }
        
        .product__hover li {
            margin-bottom: 10px;
        }
        
        .product__hover a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }
        
        .product__hover a:hover {
            background: #111;
            color: white;
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
  
    <div id="preloder">
        <div class="loader"></div>
    </div>

 
    <div class="sidebar-overlay"></div>
   
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
    
    <div class="product-modal">
        <div class="modal-content">
            <div class="close-modal">&times;</div>
            <div class="modal-body">
                <div class="modal-image">
                    <img src="" alt="Product Image" id="modal-product-image">
                </div>
                <div class="modal-details">
                    <h2 class="modal-title" id="modal-product-name">Product Name</h2>
                    <div class="modal-price" id="modal-product-price">$0.00</div>
                    <div class="modal-description" id="modal-product-description">
                        Product description goes here. This is a detailed description of the product features, materials, and benefits.
                    </div>
                    <div class="modal-features">
                        <ul>
                            <li>
                                <span class="feature-label">Material:</span>
                                <span class="feature-value" id="modal-product-material">Cotton</span>
                            </li>
                            <li>
                                <span class="feature-label">Size:</span>
                                <span class="feature-value" id="modal-product-size">M, L, XL</span>
                            </li>
                            <li>
                                <span class="feature-label">Color:</span>
                                <span class="feature-value" id="modal-product-color">Black, Navy, Grey</span>
                            </li>
                            <li>
                                <span class="feature-label">SKU:</span>
                                <span class="feature-value" id="modal-product-sku">MF-001</span>
                            </li>
                        </ul>
                    </div>
                    <div class="quantity-selector">
                        <span class="quantity-label">Quantity:</span>
                        <div class="quantity-controls">
                            <button class="quantity-btn minus">-</button>
                            <input type="text" class="quantity-input" value="1" readonly>
                            <button class="quantity-btn plus">+</button>
                        </div>
                    </div>
                    <div class="modal-actions">
                        <button class="btn-primary modal-add-cart">Add to Cart</button>
                        <button class="btn-secondary modal-add-wishlist">Add to Wishlist</button>
                    </div>
                </div>
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
            <a href="#" class="wishlist-icon-nav"><img src="img/icon/heart.png" alt=""> <span class="wishlist-count">0</span></a>
            <a href="#" class="cart-icon-nav"><img src="img/icon/cart.png" alt=""> <span class="cart-count">0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
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
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                      
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    <li><a href="#" class="category-filter filter-active" data-category="all">All Products</a></li>
                                                    <li><a href="#" class="category-filter" data-category="scarf">Scarf</a></li>
                                                    <li><a href="#" class="category-filter" data-category="crochet">Crochet</a></li>
                                                    <li><a href="#" class="category-filter" data-category="long-coat">Long Coat</a></li>
                                                    <li><a href="#" class="category-filter" data-category="leather-jacket">Leather Jacket</a></li>
                                                    <li><a href="#" class="category-filter" data-category="ankle-boots">Ankle Boots</a></li>
                                                    <li><a href="#" class="category-filter" data-category="hoodie">Hoodie</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="#" class="price-filter" data-price="0-50">$0.00 - $50.00</a></li>
                                                    <li><a href="#" class="price-filter" data-price="50-100">$50.00 - $100.00</a></li>
                                                    <li><a href="#" class="price-filter" data-price="100-150">$100.00 - $150.00</a></li>
                                                    <li><a href="#" class="price-filter" data-price="150-200">$150.00 - $200.00</a></li>
                                                    <li><a href="#" class="price-filter" data-price="200-250">$200.00 - $250.00</a></li>
                                                    <li><a href="#" class="price-filter" data-price="250+">250.00+</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseSix">Tags</a>
                                    </div>
                                    <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__tags">
                                                <a href="#" class="tag-filter" data-tag="casual">Casual</a>
                                                <a href="#" class="tag-filter" data-tag="formal">Formal</a>
                                                <a href="#" class="tag-filter" data-tag="winter">Winter</a>
                                                <a href="#" class="tag-filter" data-tag="summer">Summer</a>
                                                <a href="#" class="tag-filter" data-tag="sale">Sale</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p id="results-count">Showing 1–8 of 24 results</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select id="sort-select">
                                        <option value="default">Default</option>
                                        <option value="low-high">Low To High</option>
                                        <option value="high-low">High To Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                  <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Best Sellers</li>
                      
                    </ul>
                </div>
            </div>
            <div class="row product__filter" id="products-container">
                <!-- Products will be dynamically loaded here -->
            </div>
        </div>
    </section>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination" id="pagination-container">
                                <!-- Pagination will be dynamically loaded here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

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
        // Product Data with working image URLs
        const products = [
            { id: 1, name: "Cotton Scarf", price: 26.28, category: "scarf", tags: ["casual", "winter"], image: "img/products/s-1.jpg" },
            { id: 2, name: "Wool Crochet", price: 67.24, category: "crochet", tags: ["casual", "winter"], image: "img/products/c-3.jpg" },
            { id: 3, name: "Long Winter Coat", price: 43.48, category: "long-coat", tags: ["formal", "winter"], image: "img/products/l-1.jpg" },
            { id: 4, name: "Leather Biker Jacket", price: 60.9, category: "leather-jacket", tags: ["casual", "sale"], image: "img/products/leather-2.jpg" },
            { id: 5, name: "Ankle Boots", price: 31.37, category: "ankle-boots", tags: ["casual", "winter"], image: "img/products/product_1763911563_6923278b30815.jpg" },
            { id: 6, name: "Cotton Hoodie", price: 98.49, category: "hoodie", tags: ["casual", "summer"], image: "img/products/h-3.jpg" },
            { id: 7, name: "Silk Scarf", price: 49.66, category: "scarf", tags: ["formal", "summer"], image: "img/products/s-2.jpg" },
            { id: 8, name: "Crochet Sweater", price: 26.28, category: "crochet", tags: ["casual", "winter"], image: "img/products/product_1763913263_69232e2f3e037.jpg" },
            { id: 9, name: "Trench Coat", price: 120.50, category: "long-coat", tags: ["formal", "winter"], image: "img/products/Screenshot 2025-11-25 092905.jpg" },
            { id: 10, name: "Leather Jacket", price: 150.75, category: "leather-jacket", tags: ["casual", "sale"], image: "img/products/leather-1.jpg" },
            { id: 11, name: "Winter Ankle Boots", price: 89.99, category: "ankle-boots", tags: ["casual", "winter"], image: "img/products/b-3.jpg" },
            { id: 12, name: "Zip Hoodie", price: 45.25, category: "hoodie", tags: ["casual", "summer"], image: "img/products/h-1.jpg" },
            { id: 13, name: "Pashmina Scarf", price: 35.40, category: "scarf", tags: ["formal", "winter"], image: "img/products/s-3.jpg" },
            { id: 14, name: "Crochet Beanie", price: 22.80, category: "crochet", tags: ["casual", "winter"], image: "img/products/c-1.jpg" },
            { id: 15, name: "Wool Long Coat", price: 180.00, category: "long-coat", tags: ["formal", "winter"], image: "img/products/product_1763911459_69232723e0d8a.jpg" },
            { id: 16, name: "Bomber Leather Jacket", price: 135.60, category: "leather-jacket", tags: ["casual", "sale"], image: "https://images.unsplash.com/photo-1551028719-00167b16eac5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" },
            { id: 17, name: "Suede Ankle Boots", price: 95.30, category: "ankle-boots", tags: ["formal", "winter"], image: "img/products/b-2.jpg" },
            { id: 18, name: "Pullover Hoodie", price: 55.75, category: "hoodie", tags: ["casual", "summer"], image: "img/products/Screenshot 2025-11-23 203544.jpg" },
            { id: 19, name: "Cashmere Scarf", price: 75.20, category: "scarf", tags: ["formal", "winter"], image: "img/products/s-4.jpg" },
            { id: 20, name: "Crochet Blanket", price: 65.90, category: "crochet", tags: ["casual", "winter"], image: "img/products/c-2.jpg" },
            { id: 21, name: "Double Breasted Coat", price: 210.45, category: "long-coat", tags: ["formal", "winter"], image: "img/products/Screenshot 2025-11-25 092806.jpg" },
            { id: 22, name: "Vintage Leather Jacket", price: 175.80, category: "leather-jacket", tags: ["casual", "sale"], image: "img/products/leather-3.jpg" },
            { id: 23, name: "Chelsea Ankle Boots", price: 110.25, category: "ankle-boots", tags: ["formal", "winter"], image: "img/products/b-1.jpg" },
            { id: 24, name: "Graphic Hoodie", price: 42.50, category: "hoodie", tags: ["casual", "summer"], image: "img/products/h-2.jpg" }
        ];

        // Filtering and Pagination State
        let currentPage = 1;
        const productsPerPage = 8;
        let filteredProducts = [...products];
        let currentCategory = 'all';
        let currentPriceFilter = '';
        let currentTagFilter = '';
        let currentSort = 'default';

        // DOM Elements
        const productsContainer = document.getElementById('products-container');
        const paginationContainer = document.getElementById('pagination-container');
        const resultsCount = document.getElementById('results-count');
        const sortSelect = document.getElementById('sort-select');

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            renderProducts();
            renderPagination();
            setupEventListeners();
            
            // Initialize your existing functionality
            initializeExistingFunctionality();
        });

        // Setup Event Listeners
        function setupEventListeners() {
            // Category filters
            document.querySelectorAll('.category-filter').forEach(filter => {
                filter.addEventListener('click', function(e) {
                    e.preventDefault();
                    currentCategory = this.getAttribute('data-category');
                    currentPage = 1;
                    applyFilters();
                    
                    // Update active state
                    document.querySelectorAll('.category-filter').forEach(f => f.classList.remove('filter-active'));
                    this.classList.add('filter-active');
                });
            });

            // Price filters
            document.querySelectorAll('.price-filter').forEach(filter => {
                filter.addEventListener('click', function(e) {
                    e.preventDefault();
                    currentPriceFilter = this.getAttribute('data-price');
                    currentPage = 1;
                    applyFilters();
                    
                    // Update active state
                    document.querySelectorAll('.price-filter').forEach(f => f.classList.remove('filter-active'));
                    this.classList.add('filter-active');
                });
            });

            // Tag filters
            document.querySelectorAll('.tag-filter').forEach(filter => {
                filter.addEventListener('click', function(e) {
                    e.preventDefault();
                    currentTagFilter = this.getAttribute('data-tag');
                    currentPage = 1;
                    applyFilters();
                    
                    // Update active state
                    document.querySelectorAll('.tag-filter').forEach(f => f.classList.remove('filter-active'));
                    this.classList.add('filter-active');
                });
            });

            // Sort select
            sortSelect.addEventListener('change', function() {
                currentSort = this.value;
                currentPage = 1;
                applyFilters();
            });
        }

        // Apply All Filters
        function applyFilters() {
            // Filter by category
            if (currentCategory === 'all') {
                filteredProducts = [...products];
            } else {
                filteredProducts = products.filter(product => product.category === currentCategory);
            }

            // Filter by price
            if (currentPriceFilter) {
                if (currentPriceFilter === '250+') {
                    filteredProducts = filteredProducts.filter(product => product.price >= 250);
                } else {
                    const [min, max] = currentPriceFilter.split('-').map(Number);
                    filteredProducts = filteredProducts.filter(product => product.price >= min && product.price <= max);
                }
            }

            // Filter by tag
            if (currentTagFilter) {
                filteredProducts = filteredProducts.filter(product => 
                    product.tags.includes(currentTagFilter)
                );
            }

            // Apply sorting
            if (currentSort === 'low-high') {
                filteredProducts.sort((a, b) => a.price - b.price);
            } else if (currentSort === 'high-low') {
                filteredProducts.sort((a, b) => b.price - a.price);
            }

            renderProducts();
            renderPagination();
            updateResultsCount();
        }

        // Render Products
        function renderProducts() {
            const startIndex = (currentPage - 1) * productsPerPage;
            const endIndex = startIndex + productsPerPage;
            const productsToShow = filteredProducts.slice(startIndex, endIndex);

            productsContainer.innerHTML = '';

            productsToShow.forEach(product => {
                const productElement = document.createElement('div');
                productElement.className = 'col-lg-4 col-md-6 col-sm-6 col-md-6 col-sm-6 mix';
                
                // Determine if product is new or on sale
                const isNew = product.id % 4 === 1;
                const isSale = product.id % 4 === 3;
                
                productElement.innerHTML = `
                    <div class="product__item ${isSale ? 'sale' : ''}">
                        <div class="product__item__pic set-bg" data-setbg="${product.image}" style="background-image: url('${product.image}')">
                            ${isNew ? '<span class="label">New</span>' : ''}
                            ${isSale ? '<span class="label">Sale</span>' : ''}
                            <div class="hover-wishlist-icon">
                                <i class="fa fa-heart-o"></i>
                            </div>
                            <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>${product.name}</h6>
                            <div class="enhanced-product-actions">
                                <button class="enhanced-add-cart">Add To Cart</button>
                                <button class="enhanced-add-wishlist">Wishlist</button>
                            </div>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$${product.price.toFixed(2)}</h5>
                            <div class="product__color__select">
                                <label for="pc-${product.id}-1">
                                    <input type="radio" id="pc-${product.id}-1">
                                </label>
                                <label class="active black" for="pc-${product.id}-2">
                                    <input type="radio" id="pc-${product.id}-2">
                                </label>
                                <label class="grey" for="pc-${product.id}-3">
                                    <input type="radio" id="pc-${product.id}-3">
                                </label>
                            </div>
                        </div>
                    </div>
                `;
                
                productsContainer.appendChild(productElement);
            });

            // Re-initialize your existing product functionality
            initializeProductFunctionality();
        }

        // Render Pagination
        function renderPagination() {
            const totalPages = Math.ceil(filteredProducts.length / productsPerPage);
            
            // Only show pagination if we have more than one page
            if (totalPages <= 1) {
                paginationContainer.innerHTML = '';
                return;
            }
            
            let paginationHTML = '';
            
            // Always show first page
            paginationHTML += `<a href="#" class="${currentPage === 1 ? 'pagination-active' : ''}" data-page="1">1</a>`;
            
            // Show pages around current page
            const startPage = Math.max(2, currentPage - 1);
            const endPage = Math.min(totalPages - 1, currentPage + 1);
            
            // Add ellipsis if needed
            if (startPage > 2) {
                paginationHTML += `<span>...</span>`;
            }
            
            // Add middle pages
            for (let i = startPage; i <= endPage; i++) {
                paginationHTML += `<a href="#" class="${currentPage === i ? 'pagination-active' : ''}" data-page="${i}">${i}</a>`;
            }
            
            // Add ellipsis if needed
            if (endPage < totalPages - 1) {
                paginationHTML += `<span>...</span>`;
            }
            
            // Always show last page if there is more than one page
            if (totalPages > 1) {
                paginationHTML += `<a href="#" class="${currentPage === totalPages ? 'pagination-active' : ''}" data-page="${totalPages}">${totalPages}</a>`;
            }
            
            paginationContainer.innerHTML = paginationHTML;
            
            // Add event listeners to pagination links
            paginationContainer.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    currentPage = parseInt(this.getAttribute('data-page'));
                    renderProducts();
                    renderPagination();
                });
            });
        }

        // Update Results Count
        function updateResultsCount() {
            const startIndex = (currentPage - 1) * productsPerPage + 1;
            const endIndex = Math.min(currentPage * productsPerPage, filteredProducts.length);
            const total = filteredProducts.length;
            
            resultsCount.textContent = `Showing ${startIndex}–${endIndex} of ${total} results`;
        }

        // Initialize your existing functionality
        function initializeExistingFunctionality() {
            // Enhanced Sidebar Functionality
            const cartSidebar = document.querySelector('.cart-sidebar');
            const wishlistSidebar = document.querySelector('.wishlist-sidebar');
            const overlay = document.querySelector('.sidebar-overlay');
            const closeButtons = document.querySelectorAll('.close-sidebar');
            const cartIconNav = document.querySelectorAll('.cart-icon-nav');
            const wishlistIconNav = document.querySelectorAll('.wishlist-icon-nav');
            const productModal = document.querySelector('.product-modal');
            const closeModal = document.querySelector('.close-modal');
            
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
                }
            }
            
            // Event Listeners for static elements
            overlay.addEventListener('click', closeSidebars);
            
            closeButtons.forEach(button => {
                button.addEventListener('click', closeSidebars);
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
            
            // Close modal
            closeModal.addEventListener('click', closeModalFunc);
            
            // Close modal on overlay click
            productModal.addEventListener('click', function(e) {
                if (e.target === productModal) {
                    closeModalFunc();
                }
            });
            
            // Close on Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeSidebars();
                    closeModalFunc();
                }
            });
            
            // Initialize
            updateCartCount();
            updateWishlistCount();
            updateCartSidebar();
            updateWishlistSidebar();
            
            // Store functions globally for dynamic elements to access
            window.openCartSidebar = openCartSidebar;
            window.openWishlistSidebar = openWishlistSidebar;
            window.closeSidebars = closeSidebars;
            window.openProductModal = openProductModal;
            window.closeModalFunc = closeModalFunc;
            window.addToCart = addToCart;
            window.addToWishlist = addToWishlist;
        }

        // Initialize product functionality after rendering
        function initializeProductFunctionality() {
            // Re-initialize your product event listeners here
            const addCartButtons = document.querySelectorAll('.enhanced-add-cart');
            const addWishlistButtons = document.querySelectorAll('.enhanced-add-wishlist');
            const hoverWishlistIcons = document.querySelectorAll('.hover-wishlist-icon');
            const productItems = document.querySelectorAll('.product__item');
            
            // Add to cart buttons
            addCartButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const productCard = this.closest('.product__item');
                    window.addToCart(productCard);
                });
            });
            
            // Add to wishlist buttons
            addWishlistButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const productCard = this.closest('.product__item');
                    window.addToWishlist(productCard);
                });
            });
            
            // Hover wishlist icons
            hoverWishlistIcons.forEach(icon => {
                icon.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const productCard = this.closest('.product__item');
                    window.addToWishlist(productCard);
                    
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
                        window.openProductModal(this);
                    }
                });
            });
        }
    </script>
</body>

</html>