<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        .profile-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-bottom: 30px;
            border: 1px solid #e9ecef;
        }
        .profile-header {
            background: #fff;
            color: #333;
            padding: 30px 20px;
            text-align: center;
            border-bottom: 1px solid #e9ecef;
        }
        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 3px solid #e9ecef;
            margin: 0 auto 15px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: #6c757d;
        }
        .stats-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            border: 1px solid #e9ecef;
            height: 100%;
            transition: all 0.3s ease;
        }
        .stats-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }
        .stats-icon {
            font-size: 24px;
            margin-bottom: 12px;
            color: #6c757d;
        }
        .orders-card {
            background: white;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            border: 1px solid #e9ecef;
            margin-bottom: 25px;
        }
        .order-item {
            border-left: 3px solid #6c757d;
            padding: 15px;
            margin-bottom: 12px;
            background: #f8f9fa;
            border-radius: 0 6px 6px 0;
            transition: all 0.3s ease;
        }
        .order-item:hover {
            background: #e9ecef;
            border-left-color: #495057;
        }
        .btn-outline-primary {
            border-color: #6c757d;
            color: #495057;
        }
        .btn-outline-primary:hover {
            background-color: #6c757d;
            border-color: #6c757d;
            color: white;
        }
        .nav-pills .nav-link.active {
            background: #495057;
            border-radius: 6px;
            color: white;
        }
        .nav-pills .nav-link {
            color: #495057;
            border-radius: 6px;
            margin: 3px 0;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }
        .nav-pills .nav-link:hover {
            background: #f8f9fa;
            color: #495057;
        }
        .table {
            color: #333;
        }
        .badge {
            font-weight: 500;
        }
        h1, h2, h3, h4, h5, h6 {
            color: #333;
            font-weight: 600;
        }
        .card {
            border: 1px solid #e9ecef;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }
        .card-title {
            color: #333;
            font-weight: 600;
        }
    </style>
</head>
<body>
   
    <div class="container py-4">
        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-md-3 mb-4">
                <div class="profile-card">
                    <div class="profile-header">
                        <div class="profile-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <h5 class="mb-1">{{ $user->name }}</h5>
                        <p class="text-muted small mb-0">{{ $user->email }}</p>
                    </div>
                    <div class="p-3">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#dashboard" data-bs-toggle="pill">
                                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#orders" data-bs-toggle="pill">
                                    <i class="fas fa-shopping-bag me-2"></i> My Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#wishlist" data-bs-toggle="pill">
                                    <i class="fas fa-heart me-2"></i> Wishlist
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#cart" data-bs-toggle="pill">
                                    <i class="fas fa-shopping-cart me-2"></i> Shopping Cart
                                </a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="tab-content">
                    <!-- Dashboard Tab -->
                    <div class="tab-pane fade show active" id="dashboard">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">Dashboard</h4>
                            <span class="badge bg-secondary">Last login: {{ $user->last_login_at ? $user->last_login_at->format('M j, Y g:i A') : 'N/A' }}</span>
                        </div>

                        <!-- Stats Cards -->
                        <div class="row mb-4">
                            <div class="col-md-3 mb-3">
                                <div class="stats-card">
                                    <div class="stats-icon text-primary">
                                        <i class="fas fa-shopping-bag"></i>
                                    </div>
                                    <h4 class="mb-1">{{ $ordersCount }}</h4>
                                    <p class="mb-0 text-muted">Total Orders</p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="stats-card">
                                    <div class="stats-icon text-warning">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <h4 class="mb-1">{{ $pendingOrders }}</h4>
                                    <p class="mb-0 text-muted">Pending</p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="stats-card">
                                    <div class="stats-icon text-success">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <h4 class="mb-1">{{ $completedOrders }}</h4>
                                    <p class="mb-0 text-muted">Completed</p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="stats-card">
                                    <div class="stats-icon text-info">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                    <h4 class="mb-1">{{ $wishlistItemsCount }}</h4>
                                    <p class="mb-0 text-muted">Wishlist</p>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Orders -->
                        <div class="orders-card">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="mb-0">Recent Orders</h5>
                                <a href="#orders" class="btn btn-outline-primary btn-sm" data-bs-toggle="pill">View All Orders</a>
                            </div>
                            @if($recentOrders->count() > 0)
                                @foreach($recentOrders as $order)
                                    <div class="order-item">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1 fw-semibold">Order #{{ $order->id }}</h6>
                                                <p class="mb-1 text-muted small">Placed: {{ $order->created_at->format('M j, Y g:i A') }}</p>
                                                <span class="badge 
                                                    @if($order->status == 'completed') bg-success
                                                    @elseif($order->status == 'pending') bg-warning
                                                    @elseif($order->status == 'cancelled') bg-danger
                                                    @else bg-secondary @endif">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </div>
                                            <div class="text-end ms-3">
                                                <h6 class="mb-1 fw-semibold">${{ number_format($order->total_amount, 2) }}</h6>
                                                <a href="#" class="btn btn-outline-primary btn-sm">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-shopping-bag fa-2x text-muted mb-3"></i>
                                    <p class="text-muted mb-0">No orders found</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Orders Tab -->
                    <div class="tab-pane fade" id="orders">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">My Orders</h4>
                            <span class="badge bg-secondary">{{ $ordersCount }} orders</span>
                        </div>
                        
                        @if($ordersCount > 0)
                            <div class="orders-card">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user->orders()->latest()->take(10)->get() as $order)
                                                <tr>
                                                    <td class="fw-semibold">#{{ $order->id }}</td>
                                                    <td>{{ $order->created_at->format('M j, Y') }}</td>
                                                    <td>
                                                        <span class="badge 
                                                            @if($order->status == 'completed') bg-success
                                                            @elseif($order->status == 'pending') bg-warning
                                                            @elseif($order->status == 'cancelled') bg-danger
                                                            @else bg-secondary @endif">
                                                            {{ ucfirst($order->status) }}
                                                        </span>
                                                    </td>
                                                    <td class="fw-semibold">${{ number_format($order->total_amount, 2) }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-outline-primary btn-sm">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            <div class="orders-card">
                                <div class="text-center py-5">
                                    <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">No orders yet</h5>
                                    <p class="text-muted mb-3">You haven't placed any orders yet.</p>
                                    <a href="{{ url('/shop') }}" class="btn btn-outline-primary">Start Shopping</a>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Wishlist Tab -->
                    <div class="tab-pane fade" id="wishlist">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">My Wishlist</h4>
                            <span class="badge bg-secondary">{{ $wishlistItemsCount }} items</span>
                        </div>
                        
                        @if($wishlistItemsCount > 0)
                            <div class="row">
                                @foreach($user->wishlistItems()->with('product')->latest()->take(6)->get() as $wishlistItem)
                                    <div class="col-md-4 mb-4">
                                        <div class="card h-100">
                                            <img src="{{ $wishlistItem->product->image ?? 'https://via.placeholder.com/300' }}" class="card-img-top" alt="Product Image" style="height: 200px; object-fit: cover;">
                                            <div class="card-body">
                                                <h6 class="card-title fw-semibold">{{ $wishlistItem->product->name ?? 'Product Name' }}</h6>
                                                <p class="card-text fw-semibold text-dark">${{ number_format($wishlistItem->product->price ?? 0, 2) }}</p>
                                            </div>
                                            <div class="card-footer bg-transparent">
                                                <button class="btn btn-outline-primary btn-sm w-100 mb-2">Add to Cart</button>
                                                <button class="btn btn-outline-secondary btn-sm w-100">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="orders-card">
                                <div class="text-center py-5">
                                    <i class="fas fa-heart fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">Your wishlist is empty</h5>
                                    <p class="text-muted mb-3">Save items you love for later.</p>
                                    <a href="{{ url('/shop') }}" class="btn btn-outline-primary">Explore Products</a>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Cart Tab -->
                    <div class="tab-pane fade" id="cart">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">Shopping Cart</h4>
                            <span class="badge bg-secondary">{{ $cartItemsCount }} items</span>
                        </div>
                        
                        @if($cartItemsCount > 0)
                            <div class="orders-card">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user->cartItems()->with('product')->take(5)->get() as $cartItem)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ $cartItem->product->image ?? 'https://via.placeholder.com/50' }}" 
                                                                 alt="Product" width="50" class="me-3 rounded">
                                                            <span class="fw-semibold">{{ $cartItem->product->name ?? 'Product Name' }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="fw-semibold">${{ number_format($cartItem->product->price ?? 0, 2) }}</td>
                                                    <td>
                                                        <div class="quantity-selector d-flex align-items-center">
                                                            <button class="btn btn-sm btn-outline-secondary">-</button>
                                                            <span class="mx-2 fw-semibold">{{ $cartItem->quantity ?? 1 }}</span>
                                                            <button class="btn btn-sm btn-outline-secondary">+</button>
                                                        </div>
                                                    </td>
                                                    <td class="fw-semibold">${{ number_format(($cartItem->product->price ?? 0) * ($cartItem->quantity ?? 1), 2) }}</td>
                                                    <td>
                                                        <button class="btn btn-outline-danger btn-sm">Remove</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                                    <h5 class="mb-0 fw-semibold">Total: ${{ number_format($user->cartItems()->with('product')->get()->sum(function($item) {
                                        return ($item->product->price ?? 0) * ($item->quantity ?? 1);
                                    }), 2) }}</h5>
                                    <a href="{{ route('cart') }}" class="btn btn-outline-primary">Proceed to Checkout</a>
                                </div>
                            </div>
                        @else
                            <div class="orders-card">
                                <div class="text-center py-5">
                                    <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">Your cart is empty</h5>
                                    <p class="text-muted mb-3">Add some products to your cart.</p>
                                    <a href="{{ url('/shop') }}" class="btn btn-outline-primary">Continue Shopping</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Activate tabs based on URL hash
        document.addEventListener('DOMContentLoaded', function() {
            const hash = window.location.hash;
            if (hash) {
                const trigger = document.querySelector(`a[href="${hash}"]`);
                if (trigger) {
                    const tab = new bootstrap.Tab(trigger);
                    tab.show();
                }
            }
        });
    </script>
</body>
</html>