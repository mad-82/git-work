<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - WinterFall Fashion</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #e0e0e0;
        }

        .container {
            display: flex;
            max-width: 1200px;
            width: 100%;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            overflow: hidden;
            background: #2d2d2d;
            border: 1px solid #404040;
        }

        .left-panel {
            flex: 1;
            background: linear-gradient(135deg, #1a1a1a 0%, #333333 100%);
            color: #e0e0e0;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
            border-right: 1px solid #404040;
        }

        .left-panel::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.03), transparent);
            transform: rotate(45deg);
        }

        .right-panel {
            flex: 1;
            background: #2d2d2d;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 20px;
            color: #ffffff;
            position: relative;
            z-index: 2;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .tagline {
            font-size: 24px;
            margin-bottom: 40px;
            color: #b0b0b0;
            font-weight: 300;
            position: relative;
            z-index: 2;
            line-height: 1.4;
        }

        .features {
            list-style: none;
            position: relative;
            z-index: 2;
        }

        .features li {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            font-size: 16px;
            color: #cccccc;
            transition: color 0.3s ease;
        }

        .features li:hover {
            color: #ffffff;
        }

        .features li::before {
            content: "▶";
            margin-right: 15px;
            background: #404040;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
            font-weight: bold;
            color: #e0e0e0;
            transition: all 0.3s ease;
        }

        .features li:hover::before {
            background: #555555;
            transform: scale(1.1);
        }

        .form-title {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-subtitle {
            color: #b0b0b0;
            margin-bottom: 40px;
            font-size: 16px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #cccccc;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #404040;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #1a1a1a;
            color: #e0e0e0;
            outline: none;
        }

        input::placeholder {
            color: #666666;
        }

        input:focus {
            border-color: #666666;
            box-shadow: 0 0 0 3px rgba(102, 102, 102, 0.1);
            background: #222222;
            transform: translateY(-2px);
        }

        .btn {
            background: linear-gradient(135deg, #404040 0%, #666666 100%);
            color: #ffffff;
            border: none;
            padding: 18px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, #555555 0%, #777777 100%);
        }

        .btn:active {
            transform: translateY(-1px);
        }

        .login-link {
            text-align: center;
            margin-top: 30px;
            color: #888888;
            font-size: 14px;
        }

        .login-link a {
            color: #cccccc;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
            border-bottom: 1px solid transparent;
        }

        .login-link a:hover {
            color: #ffffff;
            border-bottom: 1px solid #ffffff;
        }

        /* Order Message Styles */
        .order-message {
            background: linear-gradient(135deg, #333333 0%, #555555 100%);
            color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: center;
            animation: slideInDown 0.5s ease;
            border: 1px solid #555555;
            position: relative;
            overflow: hidden;
        }

        .order-message::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: #888888;
        }

        .order-message h4 {
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: 600;
            color: #ffffff;
        }

        .order-message p {
            font-size: 14px;
            margin: 0;
            color: #cccccc;
            line-height: 1.5;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Floating animation for left panel */
        .left-panel {
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        /* Responsive Design */
        @media (max-width: 968px) {
            .container {
                flex-direction: column;
                max-width: 500px;
            }
            
            .left-panel {
                padding: 40px 30px;
                text-align: center;
                border-right: none;
                border-bottom: 1px solid #404040;
            }
            
            .right-panel {
                padding: 40px 30px;
            }
            
            .form-title {
                font-size: 28px;
            }
            
            .tagline {
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
                background: #1a1a1a;
            }
            
            .container {
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            }
            
            .left-panel, .right-panel {
                padding: 30px 20px;
            }
            
            .form-title {
                font-size: 24px;
            }
            
            .tagline {
                font-size: 18px;
            }
            
            .features li {
                font-size: 14px;
            }
            
            .logo {
                font-size: 28px;
            }
        }

        /* Loading state for button */
        .btn.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .btn.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            border: 2px solid #ffffff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Input focus animations */
        .form-group {
            position: relative;
        }

        .form-group input:valid {
            border-color: #555555;
        }

        .form-group input:invalid:not(:focus):not(:placeholder-shown) {
            border-color: #666666;
        }

        /* Additional decorative elements */
        .decoration {
            position: absolute;
            width: 100px;
            height: 100px;
            border: 2px solid #404040;
            border-radius: 50%;
            opacity: 0.1;
        }

        .decoration-1 {
            top: 10%;
            right: 10%;
            animation: rotate 20s linear infinite;
        }

        .decoration-2 {
            bottom: 10%;
            left: 10%;
            animation: rotate 15s linear infinite reverse;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Password strength indicator */
        .password-strength {
            margin-top: 8px;
            height: 4px;
            background: #404040;
            border-radius: 2px;
            overflow: hidden;
        }

        .strength-bar {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak { background: #ff4757; width: 33%; }
        .strength-medium { background: #ffa502; width: 66%; }
        .strength-strong { background: #2ed573; width: 100%; }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <div class="decoration decoration-1"></div>
            <div class="decoration decoration-2"></div>
            <div class="logo">WinterFall</div>
            <h2 class="tagline">Elevate Your Winter Style with Premium Fashion</h2>
            <ul class="features">
                <li>Exclusive access to winter collections</li>
                <li>Member-only discounts and early access</li>
                <li>Personalized style recommendations</li>
                <li>Premium customer support</li>
                <li>Free shipping on all orders</li>
                <li>Secure and private shopping experience</li>
            </ul>
        </div>
        
        <div class="right-panel">
            <h1 class="form-title">Join WinterFall</h1>
            <p class="form-subtitle">Create your account and discover the art of winter fashion</p>
            
            <!-- Order Message -->
            <div id="order-message" class="order-message" style="display: none;">
                <h4>🎯 Complete Your Purchase</h4>
                <p>Finish creating your account to proceed with checkout</p>
            </div>
            
            <form method="POST" action="{{ route('register') }}" id="register-form">
                @csrf
                
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Enter your full name">
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Enter your email address">
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Create a secure password">
                    <div class="password-strength">
                        <div class="strength-bar" id="password-strength-bar"></div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                </div>
                
                <!-- Hidden field to track if user came from checkout -->
                <input type="hidden" name="redirect_to_checkout" id="redirect_to_checkout" value="0">
                
                <button type="submit" class="btn" id="submit-btn">
                    Create Account
                </button>
                
                <div class="login-link">
                    Already have an account? <a href="{{ route('login') }}">Sign in here</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const emailInput = document.getElementById('email');
            const orderMessage = document.getElementById('order-message');
            const redirectToCheckout = document.getElementById('redirect_to_checkout');
            const submitBtn = document.getElementById('submit-btn');
            const form = document.getElementById('register-form');
            const passwordInput = document.getElementById('password');
            const strengthBar = document.getElementById('password-strength-bar');

            // Check if user came from checkout page
            const hasPendingOrder = sessionStorage.getItem('pendingOrderCart');
            if (hasPendingOrder) {
                orderMessage.style.display = 'block';
                redirectToCheckout.value = '1';
            }

            // Form submission with loading state
            form.addEventListener('submit', function() {
                submitBtn.classList.add('loading');
                submitBtn.innerHTML = 'Creating Account...';
            });

            // Password strength indicator
            passwordInput.addEventListener('input', function() {
                const strength = calculatePasswordStrength(this.value);
                updateStrengthBar(strength);
            });

            function calculatePasswordStrength(password) {
                let strength = 0;
                if (password.length >= 8) strength++;
                if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
                if (password.match(/\d/)) strength++;
                if (password.match(/[^a-zA-Z\d]/)) strength++;
                return strength;
            }

            function updateStrengthBar(strength) {
                strengthBar.className = 'strength-bar';
                if (strength === 0) {
                    strengthBar.style.width = '0%';
                } else if (strength === 1) {
                    strengthBar.classList.add('strength-weak');
                } else if (strength === 2 || strength === 3) {
                    strengthBar.classList.add('strength-medium');
                } else {
                    strengthBar.classList.add('strength-strong');
                }
            }

            // Add input focus effects
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.background = '#222222';
                });
                
                input.addEventListener('blur', function() {
                    this.style.background = '#1a1a1a';
                });
            });
        });
    </script>
</body>
</html>