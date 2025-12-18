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
        /* Success/Error Message Styles */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            display: none;
        }
        
        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
        
        .alert-error {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
        
        .loading {
            opacity: 0.7;
            pointer-events: none;
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
   =
    <div id="preloder">
        <div class="loader"></div>
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
  
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d111551.9926412813!2d-90.27317134641879!3d38.606612219170856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1597926938024!5m2!1sen!2sbd" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
 
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Information</span>
                            <h2>Contact Us</h2>
                            <p>As you might expect of a company that began as a high-end interiors contractor, we pay
                                strict attention.</p>
                        </div>
                        <ul>
                            <li>
                                <h4>America</h4>
                                <p>195 E Parker Square Dr, Parker, CO 801 <br />+43 982-314-0958</p>
                            </li>
                            <li>
                                <h4>France</h4>
                                <p>109 Avenue Léon, 63 Clermont-Ferrand <br />+12 345-423-9893</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                     
                        <div id="form-message" class="alert"></div>
                        
                        <form id="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="name" placeholder="Name" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="phone" placeholder="Phone (Optional)">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="subject" placeholder="Subject" required>
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="message" placeholder="Message" rows="6" required></textarea>
                                    <button type="submit" class="site-btn">
                                        <span id="submit-text">Send Message</span>
                                        <span id="loading-text" style="display: none;">
                                            <i class="fa fa-spinner fa-spin"></i> Sending...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
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
    
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contact-form');
    const formMessage = document.getElementById('form-message');
    const submitText = document.getElementById('submit-text');
    const loadingText = document.getElementById('loading-text');

    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
     
        contactForm.classList.add('loading');
        submitText.style.display = 'none';
        loadingText.style.display = 'inline';
    
        formMessage.style.display = 'none';
        formMessage.className = 'alert';

        const formData = new FormData(this);

        fetch('{{ route("contact.submit") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showMessage(data.message, 'success');
                contactForm.reset();
            } else {
                showMessage(data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showMessage('Sorry, there was an error sending your message. Please try again.', 'error');
        })
        .finally(() => {
            // Reset loading state
            contactForm.classList.remove('loading');
            submitText.style.display = 'inline';
            loadingText.style.display = 'none';
        });
    });

    function showMessage(message, type) {
        formMessage.textContent = message;
        formMessage.className = `alert alert-${type}`;
        formMessage.style.display = 'block';
        
        // Scroll to message
        formMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
        
        // Hide message after 5 seconds
        setTimeout(() => {
            formMessage.style.display = 'none';
        }, 5000);
    }
});
    </script>
</body>

</html>