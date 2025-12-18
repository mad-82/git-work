<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout - WinterFall Fashion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    
    <style>
        .checkout-section {
            padding: 50px 0;
        }
        
        .checkout-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #111;
        }
        
        .checkout-form {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 8px;
        }
        
        .order-summary {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 8px;
            position: sticky;
            top: 20px;
        }
        
        .order-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #e5e5e5;
        }
        
        .order-item:last-child {
            border-bottom: none;
        }
        
        .order-item-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
            margin-right: 15px;
        }
        
        .order-item-details {
            flex: 1;
        }
        
        .order-item-name {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .order-item-price {
            color: #e53637;
            font-weight: 700;
        }
        
        .order-item-quantity {
            color: #666;
            font-size: 14px;
        }
        
        .order-totals {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #e5e5e5;
        }
        
        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .total-row.final {
            font-weight: 700;
            font-size: 18px;
            border-top: 1px solid #e5e5e5;
            padding-top: 10px;
            margin-top: 10px;
        }
        
        .empty-cart-message {
            text-align: center;
            padding: 40px 0;
            color: #999;
        }
        
        .empty-cart-message i {
            font-size: 48px;
            margin-bottom: 15px;
            display: block;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e5e5e5;
            border-radius: 4px;
            font-size: 14px;
        }
        
        .btn-checkout {
            background: #111;
            color: #fff;
            border: none;
            padding: 15px 30px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s;
            margin-top: 20px;
            position: relative;
            min-height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-checkout:hover {
            background: #333;
        }
        
        .btn-checkout:disabled {
            background: #ccc;
            cursor: not-allowed;
        }
        
        .continue-shopping {
            text-align: center;
            margin-top: 20px;
        }
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        
        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeaa7;
        }
        
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-right: 10px;
            vertical-align: middle;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .btn-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .payment-methods {
            margin-top: 20px;
        }
        
        .payment-method {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .payment-method:hover {
            border-color: #111;
        }
        
        .payment-method.selected {
            border-color: #e53637;
            background-color: #fff5f5;
        }
        
        .payment-method input {
            margin-right: 10px;
        }
        
        .payment-method-icon {
            width: 40px;
            height: 40px;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f5f5;
            border-radius: 4px;
        }
        
        .payment-method-details {
            flex: 1;
        }
        
        .payment-method-name {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .payment-method-description {
            color: #666;
            font-size: 14px;
        }

        .payment-form-container {
            margin-top: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            border: 1px solid #e5e5e5;
            display: none;
        }
        
        .payment-form-container.active {
            display: block;
            animation: fadeIn 0.3s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .card-icons {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .card-icon {
            width: 40px;
            height: 25px;
            background: #f5f5f5;
            border-radius: 3px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: #666;
        }
        
        .form-row {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .form-row .form-group {
            flex: 1;
            margin-bottom: 0;
        }
        
        .paypal-button {
            background: #0070ba;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: background 0.3s;
        }
        
        .paypal-button:hover {
            background: #005ea6;
        }
        
        .cash-message {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            color: #666;
        }
        
        .cash-message i {
            font-size: 48px;
            color: #28a745;
            margin-bottom: 15px;
            display: block;
        }

        .debug-info {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
            margin: 10px 0;
            font-size: 12px;
            color: #666;
            border-left: 4px solid #007bff;
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

    <!-- Checkout Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="checkout-title">Checkout</h2>
                </div>
            </div>
            
            <!-- Success/Error Messages -->
            <div id="message-container"></div>
            
            <!-- Debug Info -->
            <div id="debug-info" class="debug-info" style="display: none;">
                Debug information will appear here
            </div>
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-form">
                        <h4>Billing Details</h4>
                        <form id="checkout-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">First Name *</label>
                                        <input type="text" name="first_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Last Name *</label>
                                        <input type="text" name="last_name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Address *</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">City *</label>
                                <input type="text" name="city" class="form-control" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Country *</label>
                                        <input type="text" name="country" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Postcode *</label>
                                        <input type="text" name="postcode" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Phone *</label>
                                <input type="tel" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email *</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            
                            <h4 style="margin-top: 30px;">Payment Method</h4>
                            <div class="payment-methods">
                                <div class="payment-method" data-method="credit-card">
                                    <input type="radio" name="payment_method" value="credit-card" checked>
                                    <div class="payment-method-icon">
                                        <i class="fa fa-credit-card"></i>
                                    </div>
                                    <div class="payment-method-details">
                                        <div class="payment-method-name">Credit Card</div>
                                        <div class="payment-method-description">Pay with your credit card</div>
                                    </div>
                                </div>
                                <div class="payment-method" data-method="paypal">
                                    <input type="radio" name="payment_method" value="paypal">
                                    <div class="payment-method-icon">
                                        <i class="fa fa-paypal"></i>
                                    </div>
                                    <div class="payment-method-details">
                                        <div class="payment-method-name">PayPal</div>
                                        <div class="payment-method-description">Pay securely with PayPal</div>
                                    </div>
                                </div>
                                <div class="payment-method" data-method="cash">
                                    <input type="radio" name="payment_method" value="cash">
                                    <div class="payment-method-icon">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="payment-method-details">
                                        <div class="payment-method-name">Cash on Delivery</div>
                                        <div class="payment-method-description">Pay when you receive your order</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Credit Card Payment Form -->
                            <div id="credit-card-form" class="payment-form-container active">
                                <h5>Credit Card Details</h5>
                                <div class="card-icons">
                                    <div class="card-icon">VISA</div>
                                    <div class="card-icon">MC</div>
                                    <div class="card-icon">AMEX</div>
                                    <div class="card-icon">DISC</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Card Number *</label>
                                    <input type="text" name="card_number" class="form-control" placeholder="1234 5678 9012 3456" maxlength="19" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Expiry Date *</label>
                                        <input type="text" name="expiry_date" class="form-control" placeholder="MM/YY" maxlength="5" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">CVV *</label>
                                        <input type="text" name="cvv" class="form-control" placeholder="123" maxlength="3" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Cardholder Name *</label>
                                    <input type="text" name="cardholder_name" class="form-control" placeholder="John Doe" required>
                                </div>
                            </div>
                            
                            <!-- PayPal Payment Form -->
                            <div id="paypal-form" class="payment-form-container">
                                <h5>PayPal Payment</h5>
                                <div class="cash-message">
                                    <i class="fa fa-paypal"></i>
                                    <p>You will be redirected to PayPal to complete your payment securely.</p>
                                    <button type="button" class="paypal-button" id="paypal-redirect-btn">
                                        <i class="fa fa-paypal"></i>
                                        Continue with PayPal
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Cash on Delivery Message -->
                            <div id="cash-form" class="payment-form-container">
                                <div class="cash-message">
                                    <i class="fa fa-money"></i>
                                    <h5>Cash on Delivery</h5>
                                    <p>You will pay when you receive your order. Our delivery executive will collect the payment.</p>
                                    <p><strong>Please keep exact change ready.</strong></p>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Order Notes (Optional)</label>
                                <textarea name="notes" class="form-control" rows="4" placeholder="Notes about your order..."></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order-summary">
                        <h4>Your Order</h4>
                        <div id="order-items-container">
                            <!-- Dynamic order items will be inserted here -->
                        </div>
                        <div class="order-totals">
                            <div class="total-row">
                                <span>Subtotal:</span>
                                <span id="subtotal">$0.00</span>
                            </div>
                            <div class="total-row">
                                <span>Shipping:</span>
                                <span id="shipping">$10.00</span>
                            </div>
                            <div class="total-row">
                                <span>Tax:</span>
                                <span id="tax">$0.00</span>
                            </div>
                            <div class="total-row final">
                                <span>Total:</span>
                                <span id="total">$0.00</span>
                            </div>
                        </div>
                        <button class="btn-checkout" id="place-order-btn">
                            <div class="btn-content">
                                <span id="btn-loading" class="loading" style="display: none;"></span>
                                <span id="btn-text">Place Order</span>
                            </div>
                        </button>
                        <div class="continue-shopping">
                            <a href="{{ route('home') }}">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

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
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2020
                            All rights reserved | This template is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

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
        // Fixed Checkout Functionality - WITH PROPER AUTH CHECK
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Checkout page loaded - WITH PROPER AUTH CHECK');
            
            // Global variables
            let cartItems = [];
            
            // Initialize the checkout page
            function initializeCheckout() {
                console.log('Initializing checkout...');
                
                // Load cart items from localStorage
                loadCartItems();
                
                // Update UI
                updateCartCount();
                updateOrderSummary();
                
                // Setup event listeners
                setupEventListeners();
                
                // Show initial payment form
                showPaymentForm('credit-card');
                
                console.log('Checkout initialization complete. Cart items:', cartItems);
            }
            
            // Load cart items from localStorage
            function loadCartItems() {
                try {
                    const storedCart = localStorage.getItem('cartItems');
                    console.log('Raw localStorage cart data:', storedCart);
                    
                    if (storedCart) {
                        cartItems = JSON.parse(storedCart);
                        console.log('Parsed cart items:', cartItems);
                    } else {
                        cartItems = [];
                        console.log('No cart items found in localStorage');
                    }
                } catch (error) {
                    console.error('Error loading cart items:', error);
                    cartItems = [];
                }
            }
            
            // Update cart count in header
            function updateCartCount() {
                const cartCountElements = document.querySelectorAll('.cart-count');
                const totalItems = cartItems.reduce((total, item) => total + (item.quantity || 1), 0);
                
                console.log('Updating cart count:', totalItems);
                
                cartCountElements.forEach(element => {
                    element.textContent = totalItems;
                });
            }
            
            // Calculate price from string
            function calculatePrice(priceString) {
                if (!priceString) {
                    console.warn('Price string is empty');
                    return 0;
                }
                
                try {
                    // Remove $ sign and any commas, then convert to number
                    const cleanPrice = priceString.toString().replace('$', '').replace(',', '').trim();
                    const price = parseFloat(cleanPrice);
                    
                    if (isNaN(price)) {
                        console.warn('Invalid price format:', priceString);
                        return 0;
                    }
                    
                    return price;
                } catch (error) {
                    console.error('Error calculating price:', error);
                    return 0;
                }
            }
            
            // Update order summary
            function updateOrderSummary() {
                const orderItemsContainer = document.getElementById('order-items-container');
                const subtotalElement = document.getElementById('subtotal');
                const shippingElement = document.getElementById('shipping');
                const taxElement = document.getElementById('tax');
                const totalElement = document.getElementById('total');
                const placeOrderBtn = document.getElementById('place-order-btn');
                
                console.log('Updating order summary with', cartItems.length, 'items');
                
                if (!cartItems || cartItems.length === 0) {
                    console.log('Cart is empty, showing empty message');
                    orderItemsContainer.innerHTML = `
                        <div class="empty-cart-message">
                            <i class="fa fa-shopping-cart"></i>
                            <p>Your cart is empty</p>
                            <p><a href="{{ route('home') }}">Continue Shopping</a></p>
                        </div>
                    `;
                    subtotalElement.textContent = '$0.00';
                    shippingElement.textContent = '$0.00';
                    taxElement.textContent = '$0.00';
                    totalElement.textContent = '$0.00';
                    
                    if (placeOrderBtn) {
                        placeOrderBtn.disabled = true;
                        placeOrderBtn.innerHTML = '<div class="btn-content"><span id="btn-text">Cart is Empty</span></div>';
                    }
                    return;
                }
                
                let itemsHTML = '';
                let subtotal = 0;
                
                cartItems.forEach((item, index) => {
                    const price = calculatePrice(item.price);
                    const quantity = item.quantity || 1;
                    const itemTotal = price * quantity;
                    subtotal += itemTotal;
                    
                    console.log(`Item ${index + 1}:`, {
                        name: item.name,
                        price: item.price,
                        calculatedPrice: price,
                        quantity: quantity,
                        itemTotal: itemTotal
                    });
                    
                    itemsHTML += `
                        <div class="order-item">
                            <img src="${item.image || 'img/product/product-1.jpg'}" 
                                 alt="${item.name}" 
                                 class="order-item-image"
                                 onerror="this.src='img/product/product-1.jpg'">
                            <div class="order-item-details">
                                <div class="order-item-name">${item.name || 'Unnamed Product'}</div>
                                <div class="order-item-price">${item.price || '$0.00'}</div>
                                <div class="order-item-quantity">Qty: ${quantity}</div>
                            </div>
                        </div>
                    `;
                });
                
                const shipping = 10.00;
                const tax = subtotal * 0.1; // 10% tax
                const total = subtotal + shipping + tax;
                
                console.log('Order totals:', {
                    subtotal: subtotal,
                    shipping: shipping,
                    tax: tax,
                    total: total
                });
                
                orderItemsContainer.innerHTML = itemsHTML;
                subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
                shippingElement.textContent = `$${shipping.toFixed(2)}`;
                taxElement.textContent = `$${tax.toFixed(2)}`;
                totalElement.textContent = `$${total.toFixed(2)}`;
                
                if (placeOrderBtn) {
                    placeOrderBtn.disabled = false;
                    placeOrderBtn.innerHTML = '<div class="btn-content"><span id="btn-text">Place Order</span></div>';
                }
            }
            
            // Show payment form based on selected method
            function showPaymentForm(method) {
                // Hide all payment forms
                document.querySelectorAll('.payment-form-container').forEach(form => {
                    form.classList.remove('active');
                });
                
                // Show selected payment form
                const formId = method + '-form';
                const form = document.getElementById(formId);
                if (form) {
                    form.classList.add('active');
                }
                
                console.log('Showing payment form for:', method);
            }
            
            // Validate payment form based on selected method
            function validatePaymentForm() {
                const selectedMethod = document.querySelector('input[name="payment_method"]:checked').value;
                
                if (selectedMethod === 'credit-card') {
                    // Validate credit card form
                    const cardNumber = document.querySelector('input[name="card_number"]').value;
                    const expiryDate = document.querySelector('input[name="expiry_date"]').value;
                    const cvv = document.querySelector('input[name="cvv"]').value;
                    const cardholderName = document.querySelector('input[name="cardholder_name"]').value;
                    
                    if (!cardNumber || !expiryDate || !cvv || !cardholderName) {
                        showMessage('Please fill all credit card details', 'danger');
                        return false;
                    }
                    
                    // Basic card number validation (just length check)
                    if (cardNumber.replace(/\s/g, '').length < 15) {
                        showMessage('Please enter a valid card number', 'danger');
                        return false;
                    }
                    
                    // Basic expiry date validation
                    if (!expiryDate.match(/^\d{2}\/\d{2}$/)) {
                        showMessage('Please enter expiry date in MM/YY format', 'danger');
                        return false;
                    }
                    
                    // Basic CVV validation
                    if (!cvv.match(/^\d{3,4}$/)) {
                        showMessage('Please enter a valid CVV', 'danger');
                        return false;
                    }
                }
                
                return true;
            }
            
            // Show message
            function showMessage(message, type = 'success') {
                const messageContainer = document.getElementById('message-container');
                messageContainer.innerHTML = `
                    <div class="alert alert-${type}">
                        ${message}
                    </div>
                `;
                
                // Auto-hide after 5 seconds
                setTimeout(() => {
                    messageContainer.innerHTML = '';
                }, 5000);
            }
            
            // Validate form
            function validateForm() {
                const requiredFields = document.querySelectorAll('#checkout-form [required]');
                let isValid = true;
                
                // Check all required fields
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.style.borderColor = '#e53637';
                    } else {
                        field.style.borderColor = '#e5e5e5';
                    }
                });
                
                // Validate email format
                const emailField = document.querySelector('input[name="email"]');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailField && !emailRegex.test(emailField.value)) {
                    isValid = false;
                    emailField.style.borderColor = '#e53637';
                    showMessage('Please enter a valid email address', 'danger');
                }
                
                if (!isValid) {
                    showMessage('Please fill all required fields correctly', 'danger');
                    return false;
                }
                
                // Validate payment form
                if (!validatePaymentForm()) {
                    return false;
                }
                
                return true;
            }
            
            // Show debug info
            function showDebugInfo(info) {
                const debugElement = document.getElementById('debug-info');
                debugElement.style.display = 'block';
                debugElement.innerHTML = `<strong>Debug:</strong> ${info}`;
            }
            
            // Check if user is logged in - PROPER METHOD
            function isUserLoggedIn() {
                // Check if Laravel auth check is available
                return @json(auth()->check());
            }
            
            // Redirect to register page with checkout flag
            function redirectToRegister() {
                // Set flag in sessionStorage to indicate user came from checkout
                sessionStorage.setItem('pendingOrderCart', 'true');
                // Save cart items to maintain them during registration
                sessionStorage.setItem('checkoutCartItems', JSON.stringify(cartItems));
                window.location.href = '/register';
            }
            
            // Place order function - WITH PROPER AUTH CHECK
            function placeOrder() {
                console.log('Placing order...');
                showDebugInfo('Button clicked, starting order process...');
                
                if (cartItems.length === 0) {
                    showMessage('Your cart is empty! Please add some items before placing an order.', 'danger');
                    showDebugInfo('Cart is empty');
                    return;
                }
                
                // Check if user is logged in - PROPER CHECK
                if (!isUserLoggedIn()) {
                    showMessage('Please register or login to complete your order', 'warning');
                    showDebugInfo('User not logged in, redirecting to register');
                    
                    // Redirect to register page after a short delay
                    setTimeout(() => {
                        redirectToRegister();
                    }, 1500);
                    return;
                }
                
                if (!validateForm()) {
                    showDebugInfo('Form validation failed');
                    return;
                }
                
                const btn = document.getElementById('place-order-btn');
                const btnText = document.getElementById('btn-text');
                const btnLoading = document.getElementById('btn-loading');
                
                // Show loading state
                btn.disabled = true;
                if (btnText) btnText.textContent = 'Processing...';
                if (btnLoading) btnLoading.style.display = 'inline-block';
                
                showDebugInfo('Button state: Loading (disabled)');
                
                // Prepare form data for Laravel backend
                const formData = new FormData(document.getElementById('checkout-form'));
                
                // Add cart items to form data
                formData.append('cart_items', JSON.stringify(cartItems));
                
                // Calculate totals for verification
                const subtotal = cartItems.reduce((total, item) => {
                    const price = calculatePrice(item.price);
                    const quantity = item.quantity || 1;
                    return total + (price * quantity);
                }, 0);
                const shipping = 10.00;
                const tax = subtotal * 0.1;
                const total = subtotal + shipping + tax;
                
                // Add totals to form data
                formData.append('subtotal', subtotal.toFixed(2));
                formData.append('shipping', shipping.toFixed(2));
                formData.append('tax', tax.toFixed(2));
                formData.append('total_amount', total.toFixed(2));
                
                console.log('Sending order data to Laravel backend...', {
                    cartItems: cartItems,
                    totals: { subtotal, shipping, tax, total }
                });
                showDebugInfo('Sending data to server...');
                
                // Send order request to Laravel backend
                fetch('/checkout/process', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                                       document.querySelector('input[name="_token"]')?.value
                    },
                    body: formData
                })
                .then(response => {
                    console.log('Response status:', response.status);
                    showDebugInfo(`Server response: ${response.status}`);
                    
                    if (!response.ok) {
                        // Try to parse error response
                        return response.text().then(text => {
                            let errorData;
                            try {
                                errorData = JSON.parse(text);
                            } catch {
                                errorData = { message: `Server error: ${response.status}` };
                            }
                            throw new Error(errorData.message || `Server error: ${response.status}`);
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Order response from Laravel:', data);
                    showDebugInfo(`Server response: ${JSON.stringify(data)}`);
                    
                    if (data.success) {
                        showMessage(`Order placed successfully! Order #: ${data.order_number}`, 'success');
                        
                        // Clear cart
                        localStorage.removeItem('cartItems');
                        sessionStorage.removeItem('pendingOrderCart');
                        sessionStorage.removeItem('checkoutCartItems');
                        cartItems = [];
                        updateCartCount();
                        updateOrderSummary();
                        
                        // Redirect to success page
                        setTimeout(() => {
                            if (data.order_id && data.order_number) {
                                window.location.href = `/order-success?order_id=${data.order_id}&order_number=${data.order_number}`;
                            } else {
                                window.location.href = '/order-success';
                            }
                        }, 2000);
                    } else {
                        throw new Error(data.message || 'Order failed');
                    }
                })
                .catch(error => {
                    console.error('Order error:', error);
                    showDebugInfo(`Error: ${error.message}`);
                    showMessage('Order failed: ' + error.message, 'danger');
                })
                .finally(() => {
                    // Reset button state
                    btn.disabled = false;
                    if (btnText) btnText.textContent = 'Place Order';
                    if (btnLoading) btnLoading.style.display = 'none';
                    showDebugInfo('Button state: Reset to normal');
                });
            }
            
            // Setup event listeners
            function setupEventListeners() {
                const placeOrderBtn = document.getElementById('place-order-btn');
                if (placeOrderBtn) {
                    placeOrderBtn.addEventListener('click', placeOrder);
                    console.log('Place order button event listener added');
                } else {
                    console.error('Place order button not found!');
                }
                
                // Payment method selection
                const paymentMethods = document.querySelectorAll('.payment-method');
                paymentMethods.forEach(method => {
                    method.addEventListener('click', function() {
                        // Remove selected class from all methods
                        paymentMethods.forEach(m => m.classList.remove('selected'));
                        
                        // Add selected class to clicked method
                        this.classList.add('selected');
                        
                        // Update the radio button
                        const radio = this.querySelector('input[type="radio"]');
                        if (radio) {
                            radio.checked = true;
                        }
                        
                        // Show corresponding payment form
                        const methodType = this.getAttribute('data-method');
                        showPaymentForm(methodType);
                    });
                });
                
                // PayPal redirect button
                const paypalBtn = document.getElementById('paypal-redirect-btn');
                if (paypalBtn) {
                    paypalBtn.addEventListener('click', function() {
                        // For demo purposes, we'll just place the order
                        // In real implementation, this would redirect to PayPal
                        placeOrder();
                    });
                }
                
                // Credit card input formatting
                const cardNumberInput = document.querySelector('input[name="card_number"]');
                if (cardNumberInput) {
                    cardNumberInput.addEventListener('input', function(e) {
                        let value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
                        let formattedValue = value.match(/.{1,4}/g)?.join(' ');
                        if (formattedValue) {
                            e.target.value = formattedValue;
                        }
                    });
                }
                
                const expiryInput = document.querySelector('input[name="expiry_date"]');
                if (expiryInput) {
                    expiryInput.addEventListener('input', function(e) {
                        let value = e.target.value.replace(/\D/g, '');
                        if (value.length >= 2) {
                            value = value.substring(0, 2) + '/' + value.substring(2, 4);
                        }
                        e.target.value = value;
                    });
                }
                
                const cvvInput = document.querySelector('input[name="cvv"]');
                if (cvvInput) {
                    cvvInput.addEventListener('input', function(e) {
                        e.target.value = e.target.value.replace(/\D/g, '');
                    });
                }
                
                // Add input validation for required fields
                const requiredFields = document.querySelectorAll('#checkout-form [required]');
                requiredFields.forEach(field => {
                    field.addEventListener('input', function() {
                        if (this.value.trim()) {
                            this.style.borderColor = '#e5e5e5';
                        }
                    });
                });
                
                // Set first payment method as selected by default
                if (paymentMethods.length > 0) {
                    paymentMethods[0].classList.add('selected');
                }
            }
            
            // Initialize the checkout page
            initializeCheckout();
        });
    </script>
</body>
</html>