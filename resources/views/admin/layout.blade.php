<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WinterFall Admin - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    },
                    animation: {
                        'wave-shine': 'waveShine 3s ease-in-out infinite',
                        'pulse-glow': 'pulseGlow 2s ease-in-out infinite',
                        'slide-in': 'slideIn 0.3s ease-out',
                        'ripple': 'ripple 1.5s linear infinite',
                    }
                }
            }
        }
    </script>
    <style>
        /* Enhanced Sidebar with visible grey gradient and wave shines */
        .sidebar {
            background: linear-gradient(165deg, #0a0a0a 0%, #2d2d2d 30%, #404040 70%, #2d2d2d 100%);
            position: relative;
            overflow: hidden;
        }
        
        /* Multiple wave shine lines */
        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.8), transparent);
            animation: waveShine 3s ease-in-out infinite;
            box-shadow: 0 0 10px rgba(255,255,255,0.5);
        }
        
        .sidebar::after {
            content: '';
            position: absolute;
            top: 20%;
            left: -100%;
            width: 100%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.6), transparent);
            animation: waveShine 4s ease-in-out infinite 0.5s;
            box-shadow: 0 0 8px rgba(255,255,255,0.3);
        }
        
        .wave-line-1 {
            position: absolute;
            top: 40%;
            left: -100%;
            width: 100%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: waveShine 5s ease-in-out infinite 1s;
            box-shadow: 0 0 6px rgba(255,255,255,0.2);
        }
        
        .wave-line-2 {
            position: absolute;
            top: 60%;
            left: -100%;
            width: 100%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: waveShine 6s ease-in-out infinite 1.5s;
            box-shadow: 0 0 5px rgba(255,255,255,0.2);
        }
        
        .wave-line-3 {
            position: absolute;
            top: 80%;
            left: -100%;
            width: 100%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            animation: waveShine 7s ease-in-out infinite 2s;
        }
        
        @keyframes waveShine {
            0% { 
                left: -100%;
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% { 
                left: 100%;
                opacity: 0;
            }
        }
        
        /* Enhanced Navigation with ripple effects */
        .nav-item {
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
            border-left: 3px solid transparent;
            background: linear-gradient(90deg, transparent 0%, rgba(55, 65, 81, 0.3) 50%, transparent 100%);
            background-size: 200% 100%;
            background-position: -100% 0;
        }
        
        .nav-item:hover {
            background-position: 0 0;
            transform: translateX(8px);
            box-shadow: -5px 0 15px rgba(255,255,255,0.1);
        }
        
        .nav-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.6s ease;
        }
        
        .nav-item:hover::before {
            left: 100%;
        }
        
        .nav-item.active {
            background: linear-gradient(90deg, rgba(255,255,255,0.15) 0%, rgba(100, 116, 139, 0.4) 50%, rgba(255,255,255,0.15) 100%);
            border-left: 3px solid #f8fafc;
            box-shadow: 
                inset 0 0 20px rgba(255,255,255,0.1),
                0 0 15px rgba(255,255,255,0.1);
            transform: translateX(5px);
        }
        
        .nav-item.active::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 3px;
            height: 100%;
            background: linear-gradient(to bottom, #f8fafc, #94a3b8, #f8fafc);
            box-shadow: 0 0 10px rgba(248, 250, 252, 0.8);
            animation: pulseGlow 2s ease-in-out infinite;
        }
        
        /* Enhanced logo with gradient shine */
        .logo-container {
            background: linear-gradient(135deg, #1e293b 0%, #475569 50%, #1e293b 100%);
            box-shadow: 
                0 4px 15px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255,255,255,0.1);
            position: relative;
            overflow: hidden;
        }
        
        .logo-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: rotate(45deg);
            animation: logoShine 4s ease-in-out infinite;
        }
        
        @keyframes logoShine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            50% { transform: translateX(100%) translateY(100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }
        
        /* Enhanced stat cards with wave borders */
        .stat-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid #e2e8f0;
            box-shadow: 
                0 4px 6px -1px rgba(0, 0, 0, 0.05), 
                0 2px 4px -1px rgba(0, 0, 0, 0.03),
                inset 0 1px 0 rgba(255,255,255,0.8);
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #94a3b8, #64748b, #94a3b8, transparent);
            background-size: 200% 100%;
            animation: statShine 3s ease-in-out infinite;
        }
        
        @keyframes statShine {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        
        /* Enhanced top bar */
        .top-bar {
            background: linear-gradient(90deg, #ffffff 0%, #f8fafc 50%, #ffffff 100%);
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 
                0 2px 10px rgba(0, 0, 0, 0.05),
                inset 0 1px 0 rgba(255,255,255,0.8);
            position: relative;
        }
        
        .top-bar::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background: linear-gradient(90deg, transparent, #cbd5e1, transparent);
        }
        
        /* Enhanced notification badge */
        .notification-badge {
            animation: pulseGlow 1.5s ease-in-out infinite;
            box-shadow: 0 0 0 rgba(239, 68, 68, 0.4);
        }
        
        @keyframes pulseGlow {
            0% { 
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7);
            }
            50% { 
                transform: scale(1.1);
                box-shadow: 0 0 0 8px rgba(239, 68, 68, 0);
            }
            100% { 
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(239, 68, 68, 0);
            }
        }
        
        /* Content area with subtle gradient */
        .content-area {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 50%, #f8fafc 100%);
            background-attachment: fixed;
        }
        
        /* Enhanced alerts */
        .alert-success {
            background: linear-gradient(90deg, #ecfdf5 0%, #d1fae5 50%, #ecfdf5 100%);
            border-left: 4px solid #10b981;
            box-shadow: 0 2px 10px rgba(16, 185, 129, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .alert-success::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 3px;
            height: 100%;
            background: linear-gradient(to bottom, #10b981, #34d399, #10b981);
        }
        
        .alert-error {
            background: linear-gradient(90deg, #fef2f2 0%, #fee2e2 50%, #fef2f2 100%);
            border-left: 4px solid #ef4444;
            box-shadow: 0 2px 10px rgba(239, 68, 68, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .alert-error::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 3px;
            height: 100%;
            background: linear-gradient(to bottom, #ef4444, #f87171, #ef4444);
        }
        
        /* User avatar enhancement */
        .user-avatar {
            border: 2px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .user-avatar:hover {
            border-color: #94a3b8;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: scale(1.05);
        }
        
        /* Custom scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 3px;
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #64748b, #475569);
            border-radius: 3px;
            box-shadow: inset 0 0 3px rgba(0,0,0,0.3);
        }
        
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #94a3b8, #64748b);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Main Container -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="sidebar w-64 text-white shadow-2xl">
            <!-- Wave shine lines -->
            <div class="wave-line-1"></div>
            <div class="wave-line-2"></div>
            <div class="wave-line-3"></div>
            
            <div class="p-6 border-b border-gray-700 relative z-10">
                <div class="flex items-center space-x-3">
                    <div class="logo-container w-10 h-10 rounded-lg flex items-center justify-center relative z-10">
                        <i class="fas fa-snowflake text-gray-200 text-lg relative z-10"></i>
                    </div>
                    <div class="relative z-10">
                        <h1 class="text-xl font-bold text-gray-100">WinterFall</h1>
                        <p class="text-gray-400 text-xs">Premium Winter Clothes</p>
                    </div>
                </div>
            </div>
            
            <nav class="mt-6 relative z-10">
                <a href="{{ route('admin.dashboard') }}" 
                   class="nav-item flex items-center px-6 py-3 text-gray-300 hover:text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-pie mr-3 w-5 text-center"></i>
                    Dashboard
                </a>
                
                <a href="{{ route('admin.products.index') }}" 
                   class="nav-item flex items-center px-6 py-3 text-gray-300 hover:text-white {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <i class="fas fa-tshirt mr-3 w-5 text-center"></i>
                    Products
                </a>
                
                <a href="{{ route('admin.orders.index') }}" 
                   class="nav-item flex items-center px-6 py-3 text-gray-300 hover:text-white {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                    <i class="fas fa-shopping-bag mr-3 w-5 text-center"></i>
                    Orders
                </a>
                
                <!-- Contacts Menu Item -->
                <a href="{{ route('admin.contacts.index') }}" 
                   class="nav-item flex items-center px-6 py-3 text-gray-300 hover:text-white {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                    <i class="fas fa-envelope mr-3 w-5 text-center"></i>
                    Contacts
                </a>

                <a href="{{ route('admin.profile') }}" 
                   class="nav-item flex items-center px-6 py-3 text-gray-300 hover:text-white">
                    <i class="fas fa-user-circle mr-3 w-5 text-center"></i>
                    Profile
                </a>

                <a href="{{ route('admin.settings') }}" 
                   class="nav-item flex items-center px-6 py-3 text-gray-300 hover:text-white">
                    <i class="fas fa-cog mr-3 w-5 text-center"></i>
                    Settings
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <header class="top-bar">
                <div class="flex justify-between items-center px-6 py-4">
                    <h2 class="text-xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h2>
                    
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button class="p-2 text-gray-500 hover:text-gray-700 transition duration-200">
                                <i class="fas fa-bell text-lg"></i>
                                <span class="notification-badge absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                            </button>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=475569&color=fff" 
                                 alt="{{ Auth::user()->name }}" class="user-avatar h-8 w-8 rounded-full">
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-800">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">Administrator</p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="content-area flex-1 overflow-y-auto p-6">
                @if(session('success'))
                    <div class="alert-success px-4 py-3 rounded-lg mb-6 flex items-center">
                        <i class="fas fa-check-circle text-green-600 mr-2"></i>
                        <span class="text-green-800">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert-error px-4 py-3 rounded-lg mb-6 flex items-center">
                        <i class="fas fa-exclamation-circle text-red-600 mr-2"></i>
                        <span class="text-red-800">{{ session('error') }}</span>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Enhanced hover effects for sidebar items
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(8px)';
                });
                
                item.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('active')) {
                        this.style.transform = 'translateX(0)';
                    }
                });
            });
            
            // Add ripple effect to buttons
            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.cssText = `
                        position: absolute;
                        border-radius: 50%;
                        background: rgba(255, 255, 255, 0.6);
                        transform: scale(0);
                        animation: ripple 0.6s linear;
                        width: ${size}px;
                        height: ${size}px;
                        left: ${x}px;
                        top: ${y}px;
                    `;
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });
    </script>
</body>
</html>