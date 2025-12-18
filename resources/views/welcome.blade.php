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
            color: white;
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
.testimonials-section {
    padding: 80px 0;
    background: #000000;
    min-height: 100vh;
    display: flex;
    align-items: center;
}

.container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}

.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 15px;
    color: #ffffff; /* Gradient hata kar white */
}

.section-subtitle {
    font-size: 1.2rem;
    opacity: 0.8;
    color: #cccccc;
}

.testimonials-wrapper {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 60px;
    align-items: center;
}

/* Left Side - Testimonials */
.testimonials-content {
    background: rgba(255, 255, 255, 0.05);
    padding: 40px;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
}

.testimonial-slider {
    position: relative;
    min-height: 300px;
    margin-bottom: 30px;
}

.testimonial-item {
    display: none;
    animation: slideInUp 0.6s ease-out;
}

.testimonial-item.active {
    display: block;
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.testimonial-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 25px;
}

.customer-avatar {
    width: 50px;
    height: 50px;
    background: #ffffff; /* Purple gradient hata kar white */
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: #000000; /* Icon black */
}

.customer-info {
    flex: 1;
}

.customer-name {
    font-size: 1.4rem;
    font-weight: 600;
    margin-bottom: 5px;
    color: #ffffff;
}

.customer-location {
    opacity: 0.7;
    font-size: 0.95rem;
    color: #cccccc;
}

.rating-stars {
    color: #FFD700; /* Golden stars - rakha hai natural */
    font-size: 1.1rem;
}

.rating-stars i {
    margin-right: 2px;
}

.testimonial-text {
    font-size: 1.3rem;
    line-height: 1.7;
    color: #ffffff;
    font-style: italic;
    padding-left: 20px;
    border-left: 3px solid #ffffff; /* Purple hata kar white */
}

/* Navigation Buttons */
.navigation-buttons {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.nav-btn {
    padding: 15px 30px;
    border: 2px solid rgba(255, 255, 255, 0.2);
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1rem;
    font-weight: 500;
    backdrop-filter: blur(10px);
}

.nav-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.4);
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(255, 255, 255, 0.2); /* Purple shadow hata kar white */
}

.nav-btn:active {
    transform: translateY(0);
}

.slide-indicators {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 1.1rem;
    font-weight: 600;
}

.current-slide {
    color: #ffffff; /* Purple hata kar white */
    font-size: 1.3rem;
}

.total-slides {
    opacity: 0.7;
}

/* Right Side - Video */
.video-content {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.video-player {
    position: relative;
    width: 100%;
    height: 500px;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

#customerVideo {
    width: 100%;
    height: 100%;
    object-fit: cover;
    background: #000;
}

.video-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.9));
    padding: 30px;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
}

.video-info h3 {
    font-size: 1.6rem;
    font-weight: 600;
    margin-bottom: 8px;
    color: #ffffff;
}

.video-info p {
    opacity: 0.9;
    font-size: 1.1rem;
    color: #cccccc;
}

.video-controls {
    display: flex;
    gap: 12px;
}

.control-btn {
    width: 45px;
    height: 45px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    background: rgba(255, 255, 255, 0.15);
    color: white;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px);
}

.control-btn:hover {
    background: rgba(255, 255, 255, 0.25);
    border-color: rgba(255, 255, 255, 0.5);
    transform: scale(1.1);
}

.video-progress {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: rgba(255, 255, 255, 0.2);
}

.progress-bar {
    height: 100%;
    background: #ffffff; /* Purple gradient hata kar white */
    width: 0%;
    transition: width 0.1s linear;
}

/* Video Dots */
.video-dots {
    display: flex;
    justify-content: center;
    gap: 12px;
}

.video-dot {
    width: 50px;
    height: 50px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    backdrop-filter: blur(10px);
}

.video-dot.active {
    background: #ffffff; /* Purple gradient hata kar white */
    border-color: #ffffff;
    color: #000000; /* Active dot ka text black */
    transform: scale(1.1);
    box-shadow: 0 8px 20px rgba(255, 255, 255, 0.3); /* Purple shadow hata kar white */
}

.video-dot:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.5);
    transform: scale(1.05);
}

.video-dot span {
    font-size: 1rem;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .testimonials-wrapper {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .video-player {
        height: 450px;
    }
    
    .section-title {
        font-size: 2.5rem;
    }
}

@media (max-width: 768px) {
    .testimonials-section {
        padding: 60px 0;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .testimonials-content {
        padding: 30px;
    }
    
    .video-player {
        height: 400px;
    }
    
    .testimonial-header {
        flex-direction: column;
        text-align: center;
        gap: 10px;
    }
    
    .navigation-buttons {
        flex-direction: column;
        gap: 15px;
    }
    
    .nav-btn {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 576px) {
    .container {
        padding: 0 15px;
    }
    
    .section-title {
        font-size: 1.8rem;
    }
    
    .testimonial-text {
        font-size: 1.1rem;
    }
    
    .video-player {
        height: 350px;
    }
    
    .video-dot {
        width: 40px;
        height: 40px;
    }
    
    .video-overlay {
        padding: 20px;
    }
    
    .video-info h3 {
        font-size: 1.3rem;
    }
}
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #000000;
    color: #ffffff;
    line-height: 1.6;
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
 
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="img/hero/hero-3.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Winter Collections 2030</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="img/hero/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Winter Collections 2030</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
  <section class="banner spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-4">
                <div class="banner__item">
                    <div class="banner__item__pic">
                        <img src="img/banner/banner-4.jpg" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2 class="text-white fw-bold">Clothing Collections 2030</h2>
                        <a href="#" class="text-white text-decoration-none border-bottom border-white pb-1">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="banner__item banner__item--middle">
                    <div class="banner__item__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2 class="text-white fw-bold">Accessories</h2>
                        <a href="#" class="text-white text-decoration-none border-bottom border-white pb-1">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="banner__item banner__item--last">
                    <div class="banner__item__pic">
                        <img src="img/banner/banner-3.jpg" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2 class="text-white fw-bold">Shoes Spring 2030</h2>
                        <a href="#" class="text-white text-decoration-none border-bottom border-white pb-1">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                   <li class="active text-white" data-filter="*">Best Sellers</li>
                    </ul>
                </div>
            </div>

            <div class="row product__filter">
                @php
                    $productsToShow = $featuredProducts ?? \App\Models\Product::where('active', true)->take(8)->get();
                @endphp
                
                @forelse($productsToShow as $product)
                <div class="col-lg-3 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" 
                             data-setbg="{{ $product->imageUrl }}"
                             style="background-image: url('{{ $product->imageUrl }}')">
                            
                            @if($product->is_on_sale)
                            <span class="label">Sale - {{ $product->discount_percentage }}% OFF</span>
                            @elseif($product->featured)
                            <span class="label">New</span>
                            @endif

                            @if(!$product->in_stock)
                            <span class="label out-of-stock">Out of Stock</span>
                            @endif
                            
                            <div class="hover-wishlist-icon">
                                <i class="fa fa-heart-o"></i>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ $product->name }}</h6>

                            <div class="enhanced-product-actions">
                                <button class="enhanced-add-cart" data-product-id="{{ $product->id }}" 
                                        {{ !$product->in_stock ? 'disabled' : '' }}>
                                    {{ $product->in_stock ? 'Add To Cart' : 'Out of Stock' }}
                                </button>
                                <button class="enhanced-add-wishlist" data-product-id="{{ $product->id }}">Wishlist</button>
                            </div>
                            
                            <h5 class="text-white">
                                @if($product->is_on_sale)
                                <span class="text-white">{{ $product->formatted_sale_price }}</span>
                                <span class="text-white-50" style="text-decoration: line-through; font-size: 14px;">{{ $product->formatted_price }}</span>
                                @else
                                <span class="text-white">{{ $product->formatted_price }}</span>
                                @endif
                            </h5>
                            
                            <div class="product__color__select">
                                <label for="pc-{{ $product->id }}-1">
                                    <input type="radio" id="pc-{{ $product->id }}-1">
                                </label>
                                <label class="active black" for="pc-{{ $product->id }}-2">
                                    <input type="radio" id="pc-{{ $product->id }}-2">
                                </label>
                                <label class="grey" for="pc-{{ $product->id }}-3">
                                    <input type="radio" id="pc-{{ $product->id }}-3">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <div class="empty-state">
                        <i class="fa fa-tshirt"></i>
                        <p>No products available yet</p>
                        <p class="text-muted">Check back soon for new arrivals!</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>
   
    <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="categories__text">
                        <h2>Clothings Hot <br /> <span>Shoe Collection</span> <br /> Accessories</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories__hot__deal">
                        <img src="img/product-sale.png" alt="">
                        <div class="hot__deal__sticker">
                            <span>Sale Of</span>
                            <h5>$29.99</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <span>Deal Of The Week</span>
                        <h2>Multi-pocket Chest Bag Black</h2>
                        <div class="categories__deal__countdown__timer" id="countdown">
                            <div class="cd-item">
                                <span>3</span>
                                <p>Days</p>
                            </div>
                            <div class="cd-item">
                                <span>1</span>
                                <p>Hours</p>
                            </div>
                            <div class="cd-item">
                                <span>50</span>
                                <p>Minutes</p>
                            </div>
                            <div class="cd-item">
                                <span>18</span>
                                <p>Seconds</p>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <section class="testimonials-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Customer Love Stories</h2>
                <p class="section-subtitle">Real experiences from our winter collection enthusiasts</p>
            </div>
            
            <div class="testimonials-wrapper">
            
                <div class="testimonials-content">
                    <div class="testimonial-slider">
                    
                        <div class="testimonial-item active" data-index="0">
                            <div class="testimonial-header">
                                <div class="customer-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="customer-info">
                                    <h4 class="customer-name">Sarah Johnson</h4>
                                    <span class="customer-location">New York, USA</span>
                                </div>
                                <div class="rating-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <p class="testimonial-text">
                                "The quality of these winter jackets is incredible! I've been using mine for 3 months now and it still looks brand new. Perfect for harsh winters!"
                            </p>
                        </div>

                 
                        <div class="testimonial-item" data-index="1">
                            <div class="testimonial-header">
                                <div class="customer-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="customer-info">
                                    <h4 class="customer-name">Michael Chen</h4>
                                    <span class="customer-location">Toronto, Canada</span>
                                </div>
                                <div class="rating-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <p class="testimonial-text">
                                "I bought the complete winter set for my family. The kids love their colorful jackets and the warmth is just perfect. Best purchase this season!"
                            </p>
                        </div>

                        <div class="testimonial-item" data-index="2">
                            <div class="testimonial-header">
                                <div class="customer-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="customer-info">
                                    <h4 class="customer-name">Emma Wilson</h4>
                                    <span class="customer-location">London, UK</span>
                                </div>
                                <div class="rating-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                            <p class="testimonial-text">
                                "The delivery was super fast and the packaging was eco-friendly. The jacket fits perfectly and the material is so comfortable. Will definitely order again!"
                            </p>
                        </div>

                        <div class="testimonial-item" data-index="3">
                            <div class="testimonial-header">
                                <div class="customer-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="customer-info">
                                    <h4 class="customer-name">David Brown</h4>
                                    <span class="customer-location">Chicago, USA</span>
                                </div>
                                <div class="rating-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <p class="testimonial-text">
                                "As someone who's always cold, this winter collection has been a game-changer. The thermal technology really works! Highly recommended!"
                            </p>
                        </div>

                        <div class="testimonial-item" data-index="4">
                            <div class="testimonial-header">
                                <div class="customer-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="customer-info">
                                    <h4 class="customer-name">Lisa Rodriguez</h4>
                                    <span class="customer-location">Miami, USA</span>
                                </div>
                                <div class="rating-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <p class="testimonial-text">
                                "The customer service was exceptional! They helped me choose the right size and the jacket arrived within 2 days. Amazing experience!"
                            </p>
                        </div>

                        <div class="testimonial-item" data-index="5">
                            <div class="testimonial-header">
                                <div class="customer-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="customer-info">
                                    <h4 class="customer-name">James Anderson</h4>
                                    <span class="customer-location">Seattle, USA</span>
                                </div>
                                <div class="rating-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <p class="testimonial-text">
                                "I've tried many winter brands, but none compare to the quality and style of these products. Worth every penny!"
                            </p>
                        </div>
                    </div>

                    <div class="navigation-buttons">
                        <button class="nav-btn prev-btn">
                            <i class="fas fa-arrow-left"></i>
                            Previous
                        </button>
                        <div class="slide-indicators">
                            <span class="current-slide">1</span>
                            <span class="total-slides">/ 6</span>
                        </div>
                        <button class="nav-btn next-btn">
                            Next
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <div class="video-content">
                    <div class="video-player">
                        <video id="customerVideo" autoplay muted loop playsinline>
                         
                        </video>
                        <div class="video-overlay">
                            <div class="video-info">
                                <h3 id="videoTitle">Sarah Johnson</h3>
                                <p id="videoSubtitle">New York, USA</p>
                            </div>
                            <div class="video-controls">
                                <button class="control-btn" id="playPauseBtn">
                                    <i class="fas fa-pause"></i>
                                </button>
                                <button class="control-btn" id="muteBtn">
                                    <i class="fas fa-volume-up"></i>
                                </button>
                            </div>
                        </div>
                        <div class="video-progress">
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                   
                    <div class="video-dots">
                        <button class="video-dot active" data-video="costumers-video.mp4" data-index="0">
                            <span>1</span>
                        </button>
                        <button class="video-dot" data-video="costumers-video-1.mp4" data-index="1">
                            <span>2</span>
                        </button>
                        <button class="video-dot" data-video="costumers-video-2.mp4" data-index="2">
                            <span>3</span>
                        </button>
                        <button class="video-dot" data-video="costumers-video-3.mp4" data-index="3">
                            <span>4</span>
                        </button>
                        <button class="video-dot" data-video="costumers-video-4.mp4" data-index="4">
                            <span>5</span>
                        </button>
                        <button class="video-dot" data-video="costumers-video-5.mp4" data-index="5">
                            <span>6</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

 
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Latest News</span>
                        <h2>Fashion New Trends</h2>
                    </div>
                </div>
            </div>
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
            </div>
        </div>
    </section>
  
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

    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
                <div class="search-results-container" id="search-results"></div>
            </form>
        </div>
    </div>
 
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
        class TestimonialsSlider {
    constructor() {
        this.currentIndex = 0;
        this.totalItems = 6;
        this.autoSlideInterval = null;
        this.slideDuration = 10000; // 10 seconds
        this.progressInterval = null;
        
        this.initializeElements();
        this.startAutoSlide();
        this.attachEventListeners();
        this.startProgressBar();
    }
    
    initializeElements() {
        // Testimonial elements
        this.testimonialItems = document.querySelectorAll('.testimonial-item');
        this.videoDots = document.querySelectorAll('.video-dot');
        this.currentSlideElement = document.querySelector('.current-slide');
        
        // Video elements
        this.videoElement = document.getElementById('customerVideo');
        this.videoTitle = document.getElementById('videoTitle');
        this.videoSubtitle = document.getElementById('videoSubtitle');
        this.progressBar = document.querySelector('.progress-bar');
        
        // Control buttons
        this.prevBtn = document.querySelector('.prev-btn');
        this.nextBtn = document.querySelector('.next-btn');
        this.playPauseBtn = document.getElementById('playPauseBtn');
        this.muteBtn = document.getElementById('muteBtn');
        
        // Video data
        this.videoData = [
            {
                video: 'costumers-video.mp4',
                title: 'Sarah Johnson',
                subtitle: 'New York, USA',
                testimonialIndex: 0
            },
            {
                video: 'costumers-video-1.mp4',
                title: 'Michael Chen',
                subtitle: 'Toronto, Canada',
                testimonialIndex: 1
            },
            {
                video: 'costumers-video-2.mp4',
                title: 'Emma Wilson',
                subtitle: 'London, UK',
                testimonialIndex: 2
            },
            {
                video: 'costumers-video-3.mp4',
                title: 'David Brown',
                subtitle: 'Chicago, USA',
                testimonialIndex: 3
            },
            {
                video: 'costumers-video-4.mp4',
                title: 'Lisa Rodriguez',
                subtitle: 'Miami, USA',
                testimonialIndex: 4
            },
            {
                video: 'costumers-video-5.mp4',
                title: 'James Anderson',
                subtitle: 'Seattle, USA',
                testimonialIndex: 5
            }
        ];
    }
    
    attachEventListeners() {
        // Navigation buttons
        this.prevBtn.addEventListener('click', () => this.previousSlide());
        this.nextBtn.addEventListener('click', () => this.nextSlide());
        
        // Video dots
        this.videoDots.forEach((dot, index) => {
            dot.addEventListener('click', () => this.goToSlide(index));
        });
        
        // Video controls
        this.playPauseBtn.addEventListener('click', () => this.togglePlayPause());
        this.muteBtn.addEventListener('click', () => this.toggleMute());
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') this.previousSlide();
            if (e.key === 'ArrowRight') this.nextSlide();
            if (e.key === ' ') {
                e.preventDefault();
                this.togglePlayPause();
            }
        });
        
        // Handle video ended
        this.videoElement.addEventListener('ended', () => {
            this.nextSlide();
        });
    }
    
    startAutoSlide() {
        this.autoSlideInterval = setInterval(() => {
            this.nextSlide();
        }, this.slideDuration);
    }
    
    resetAutoSlide() {
        clearInterval(this.autoSlideInterval);
        this.startAutoSlide();
    }
    
    startProgressBar() {
        this.updateProgressBar();
        this.progressInterval = setInterval(() => {
            this.updateProgressBar();
        }, 100);
    }
    
    updateProgressBar() {
        if (this.videoElement.duration) {
            const progress = (this.videoElement.currentTime / this.videoElement.duration) * 100;
            this.progressBar.style.width = `${progress}%`;
        }
    }
    
    resetProgressBar() {
        this.progressBar.style.width = '0%';
    }
    
    goToSlide(index) {
        this.currentIndex = index;
        this.updateSlider();
        this.resetAutoSlide();
        this.resetProgressBar();
    }
    
    nextSlide() {
        this.currentIndex = (this.currentIndex + 1) % this.totalItems;
        this.updateSlider();
        this.resetAutoSlide();
        this.resetProgressBar();
    }
    
    previousSlide() {
        this.currentIndex = (this.currentIndex - 1 + this.totalItems) % this.totalItems;
        this.updateSlider();
        this.resetAutoSlide();
        this.resetProgressBar();
    }
    
    updateSlider() {
        // Update testimonials
        this.testimonialItems.forEach(item => item.classList.remove('active'));
        this.testimonialItems[this.currentIndex].classList.add('active');
        
        // Update video dots
        this.videoDots.forEach(dot => dot.classList.remove('active'));
        this.videoDots[this.currentIndex].classList.add('active');
        
        // Update slide indicator
        this.currentSlideElement.textContent = this.currentIndex + 1;
        
        // Update video
        this.updateVideo();
    }
    
    updateVideo() {
        const currentVideoData = this.videoData[this.currentIndex];
        const videoPath = `img/instagram/${currentVideoData.video}`;
        
        // Change video source
        this.videoElement.src = videoPath;
        this.videoElement.load();
        this.videoElement.play().catch(e => {
            console.log('Autoplay prevented:', e);
        });
        
        // Update video info
        this.videoTitle.textContent = currentVideoData.title;
        this.videoSubtitle.textContent = currentVideoData.subtitle;
        
        // Update play button to show pause icon
        this.playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
    }
    
    togglePlayPause() {
        if (this.videoElement.paused) {
            this.videoElement.play();
            this.playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
        } else {
            this.videoElement.pause();
            this.playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
        }
    }
    
    toggleMute() {
        this.videoElement.muted = !this.videoElement.muted;
        this.muteBtn.innerHTML = this.videoElement.muted ? 
            '<i class="fas fa-volume-mute"></i>' : 
            '<i class="fas fa-volume-up"></i>';
    }
}

// Initialize the slider when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    const slider = new TestimonialsSlider();
    
    // Handle video errors
    slider.videoElement.addEventListener('error', (e) => {
        console.error('Video error:', e);
        // If video fails to load, move to next slide after 2 seconds
        setTimeout(() => slider.nextSlide(), 2000);
    });
});

// Preload videos for smoother transitions
function preloadVideos() {
    const videoPaths = [
        'img/instagram/costumers-video.mp4',
        'img/instagram/costumers-video-1.mp4',
        'img/instagram/costumers-video-2.mp4',
        'img/instagram/costumers-video-3.mp4',
        'img/instagram/costumers-video-4.mp4',
        'img/instagram/costumers-video-5.mp4'
    ];
    
    videoPaths.forEach(path => {
        const video = document.createElement('video');
        video.src = path;
        video.preload = 'auto';
    });
}

// Preload videos when page loads
window.addEventListener('load', preloadVideos);

        // Enhanced Sidebar Functionality with Working Search
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
            
            // Search elements
            const searchModel = document.querySelector('.search-model');
            const searchInput = document.getElementById('search-input');
            const searchResults = document.getElementById('search-results');
            const searchCloseSwitch = document.querySelector('.search-close-switch');
            const searchSwitch = document.querySelectorAll('.search-switch');
            
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
                    cartItems.forEach((item, index) => {
                        itemsHTML += `
                            <div class="product-info" data-index="${index}">
                                <img src="${item.image}" alt="Product" class="product-image">
                                <div class="product-details">
                                    <h4 class="product-name">${item.name}</h4>
                                    <div class="product-price">${item.price}</div>
                                    <div class="quantity-selector">
                                        <span class="quantity-label">Quantity:</span>
                                        <div class="quantity-controls">
                                            <button class="quantity-btn minus" data-index="${index}">-</button>
                                            <input type="text" class="quantity-input" value="${item.quantity}" readonly>
                                            <button class="quantity-btn plus" data-index="${index}">+</button>
                                        </div>
                                    </div>
                                    <button class="btn-secondary remove-from-cart" data-index="${index}" style="margin-top: 10px; width: auto; padding: 5px 10px;">Remove</button>
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
                    
                    // Add event listeners for quantity buttons using event delegation
                    sidebarContent.addEventListener('click', function(e) {
                        if (e.target.classList.contains('minus')) {
                            const index = e.target.getAttribute('data-index');
                            if (cartItems[index].quantity > 1) {
                                cartItems[index].quantity--;
                                updateCartSidebar();
                                saveCartToStorage();
                            }
                        } else if (e.target.classList.contains('plus')) {
                            const index = e.target.getAttribute('data-index');
                            cartItems[index].quantity++;
                            updateCartSidebar();
                            saveCartToStorage();
                        } else if (e.target.classList.contains('remove-from-cart')) {
                            const index = e.target.getAttribute('data-index');
                            cartItems.splice(index, 1);
                            updateCartCount();
                            updateCartSidebar();
                            saveCartToStorage();
                        }
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
                                        <button class="btn-primary add-to-cart-from-wishlist" data-index="${index}">Add to Cart</button>
                                        <button class="btn-secondary remove-from-wishlist" data-index="${index}">Remove</button>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                    
                    sidebarContent.innerHTML = itemsHTML;
                    
                    // Add event listeners for wishlist actions using event delegation
                    sidebarContent.addEventListener('click', function(e) {
                        if (e.target.classList.contains('add-to-cart-from-wishlist')) {
                            const index = e.target.getAttribute('data-index');
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
                        } else if (e.target.classList.contains('remove-from-wishlist')) {
                            const index = e.target.getAttribute('data-index');
                            wishlistItems.splice(index, 1);
                            updateWishlistCount();
                            updateWishlistSidebar();
                            saveWishlistToStorage();
                        }
                    });
                }
            }
            
            // Search functionality
            function performSearch(query) {
                if (!query.trim()) {
                    searchResults.style.display = 'none';
                    return;
                }
                
                // Get all products from the page
                const products = [];
                productItems.forEach(item => {
                    const name = item.querySelector('h6').textContent;
                    const price = item.querySelector('h5').textContent;
                    const image = item.querySelector('.set-bg').getAttribute('data-setbg');
                    
                    products.push({
                        name: name,
                        price: price,
                        image: image,
                        element: item
                    });
                });
                
                const filteredProducts = products.filter(product => 
                    product.name.toLowerCase().includes(query.toLowerCase())
                );
                
                displaySearchResults(filteredProducts);
            }
            
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
                        // Open the product modal when search result is clicked
                        openProductModal(product.element);
                        closeSearch();
                    });
                    
                    searchResults.appendChild(resultItem);
                });
                
                searchResults.style.display = 'block';
            }
            
            function openSearch() {
                searchModel.style.display = 'block';
                document.body.style.overflow = 'hidden';
                setTimeout(() => {
                    searchInput.focus();
                }, 100);
            }
            
            function closeSearch() {
                searchModel.style.display = 'none';
                document.body.style.overflow = '';
                searchResults.style.display = 'none';
                searchInput.value = '';
            }
            
            // Event Listeners
            
            // Search functionality
            searchSwitch.forEach(icon => {
                icon.addEventListener('click', function(e) {
                    e.preventDefault();
                    openSearch();
                });
            });
            
            searchCloseSwitch.addEventListener('click', closeSearch);
            
            searchInput.addEventListener('input', function() {
                performSearch(this.value);
            });
            
            // Hide results when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.search-model-form') && !e.target.closest('.search-switch')) {
                    searchResults.style.display = 'none';
                }
            });
            
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
                        !e.target.closest('.hover-wishlist-icon')) {
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
                    closeSearch();
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