<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - Elegant</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #ffffff;
            color: #2d3748;
        }

        .orders-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .page-header {
            margin-bottom: 40px;
            border-bottom: 2px solid #f7fafc;
            padding-bottom: 20px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: #718096;
            font-size: 16px;
        }

        .orders-grid {
            display: grid;
            gap: 20px;
        }

        .order-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 24px;
            transition: all 0.3s ease;
        }

        .order-card:hover {
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }

        .order-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid #f7fafc;
        }

        .order-info h3 {
            font-weight: 600;
            margin-bottom: 4px;
            color: #2d3748;
        }

        .order-info p {
            color: #718096;
            font-size: 14px;
        }

        .order-status {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-pending { background: #fffaf0; color: #d69e2e; }
        .status-completed { background: #f0fff4; color: #38a169; }
        .status-processing { background: #ebf8ff; color: #3182ce; }
        .status-cancelled { background: #fed7d7; color: #e53e3e; }

        .order-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 16px;
        }

        .detail-item {
            margin-bottom: 8px;
        }

        .detail-label {
            font-size: 12px;
            color: #718096;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .detail-value {
            font-size: 16px;
            color: #2d3748;
            font-weight: 500;
        }

        .order-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
        }

        .btn {
            padding: 8px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            background: white;
            color: #4a5568;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-primary {
            background: #4a5568;
            color: white;
            border-color: #4a5568;
        }

        .btn:hover {
            background: #edf2f7;
        }

        .btn-primary:hover {
            background: #2d3748;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #718096;
        }

        .empty-state h3 {
            font-size: 24px;
            margin-bottom: 12px;
            color: #4a5568;
        }

        @media (max-width: 768px) {
            .order-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
            
            .order-actions {
                justify-content: flex-start;
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>
    @include('partials.header')

    <div class="orders-container">
        <div class="page-header">
            <h1 class="page-title">My Orders</h1>
            <p class="page-subtitle">Track and manage your orders</p>
        </div>

        @if($orders->count() > 0)
            <div class="orders-grid">
                @foreach($orders as $order)
                <div class="order-card">
                    <div class="order-header">
                        <div class="order-info">
                            <h3>Order #{{ $order->order_number }}</h3>
                            <p>Placed on {{ $order->created_at->format('F d, Y - h:i A') }}</p>
                        </div>
                        <div class="order-status status-{{ $order->status }}">
                            {{ ucfirst($order->status) }}
                        </div>
                    </div>
                    
                    <div class="order-details">
                        <div class="detail-item">
                            <div class="detail-label">Total Amount</div>
                            <div class="detail-value">${{ number_format($order->total_amount, 2) }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Items</div>
                            <div class="detail-value">{{ $order->items_count ?? 1 }} items</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Payment Status</div>
                            <div class="detail-value">{{ ucfirst($order->payment_status ?? 'pending') }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Shipping Address</div>
                            <div class="detail-value">{{ Str::limit($order->shipping_address ?? 'Not specified', 30) }}</div>
                        </div>
                    </div>

                    <div class="order-actions">
                        <a href="#" class="btn">View Details</a>
                        <a href="#" class="btn btn-primary">Track Order</a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($orders->hasPages())
            <div style="margin-top: 40px; display: flex; justify-content: center;">
                {{ $orders->links() }}
            </div>
            @endif

        @else
            <div class="empty-state">
                <h3>No orders yet</h3>
                <p>You haven't placed any orders. Start shopping to see your orders here!</p>
                <a href="/shop" class="btn btn-primary" style="margin-top: 20px; display: inline-block;">Start Shopping</a>
            </div>
        @endif
    </div>

    @include('partials.footer')
</body>
</html>