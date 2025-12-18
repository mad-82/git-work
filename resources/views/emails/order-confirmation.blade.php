<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Confirmation - WinterFall Fashion</title>
    <style>
        body { 
            font-family: 'Nunito Sans', Arial, sans-serif; 
            line-height: 1.6; 
            color: #333; 
            margin: 0; 
            padding: 0; 
            background-color: #f8f9fa; 
        }
        .container { 
            max-width: 600px; 
            margin: 0 auto; 
            padding: 0; 
            background: #ffffff; 
            box-shadow: 0 4px 20px rgba(0,0,0,0.1); 
        }
        .header { 
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); 
            color: #2c3e50; 
            padding: 40px 30px; 
            text-align: center; 
            border-bottom: 3px solid #95a5a6; 
        }
        .content { 
            padding: 30px; 
            background: #ffffff; 
        }
        .order-details { 
            background: #f8f9fa; 
            padding: 25px; 
            margin: 20px 0; 
            border-radius: 8px; 
            border: 1px solid #e9ecef; 
        }
        .order-item { 
            border-bottom: 1px solid #e9ecef; 
            padding: 15px 0; 
            display: flex; 
            align-items: center; 
        }
        .order-item:last-child { 
            border-bottom: none; 
        }
        .item-image { 
            width: 80px; 
            height: 80px; 
            object-fit: cover; 
            border-radius: 6px; 
            margin-right: 15px; 
            border: 1px solid #e9ecef; 
        }
        .item-details { 
            flex: 1; 
        }
        .item-name { 
            font-weight: 600; 
            margin-bottom: 5px; 
            font-size: 16px; 
            color: #2c3e50; 
        }
        .item-price { 
            color: #2c3e50; 
            font-weight: 700; 
            font-size: 16px; 
        }
        .item-quantity { 
            color: #7f8c8d; 
            font-size: 14px; 
            margin: 5px 0; 
        }
        .item-subtotal { 
            font-weight: 600; 
            color: #2c3e50; 
        }
        .totals { 
            background: #f8f9fa; 
            padding: 20px; 
            margin-top: 20px; 
            border-radius: 6px; 
            border: 1px solid #e9ecef; 
        }
        .total-row { 
            display: flex; 
            justify-content: space-between; 
            margin-bottom: 10px; 
            padding: 5px 0; 
            color: #495057; 
        }
        .total-final { 
            font-weight: 700; 
            font-size: 18px; 
            border-top: 2px solid #e9ecef; 
            padding-top: 15px; 
            margin-top: 15px; 
            color: #2c3e50; 
        }
        .footer { 
            text-align: center; 
            margin-top: 30px; 
            color: #7f8c8d; 
            font-size: 14px; 
            padding-top: 20px; 
            border-top: 1px solid #e9ecef; 
        }
        .shipping-info { 
            background: #f8f9fa; 
            padding: 20px; 
            border-radius: 8px; 
            margin: 20px 0; 
            border: 1px solid #e9ecef; 
        }
        .logo { 
            max-width: 180px; 
            margin-bottom: 15px; 
        }
        .fallback-image { 
            width: 80px; 
            height: 80px; 
            background: linear-gradient(135deg, #e9ecef, #f8f9fa); 
            border-radius: 6px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            color: #7f8c8d; 
            font-size: 11px; 
            text-align: center;
            border: 1px solid #e9ecef;
            margin-right: 15px;
            font-weight: 500;
        }
        .thank-you { 
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); 
            color: #2c3e50; 
            padding: 25px; 
            border-radius: 8px; 
            text-align: center; 
            margin: 20px 0;
            border: 1px solid #e9ecef;
        }
        .contact-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border: 1px solid #e9ecef;
        }
        .section-title {
            color: #2c3e50;
            border-bottom: 2px solid #95a5a6;
            padding-bottom: 10px;
            margin-top: 0;
        }
        .highlight {
            color: #2c3e50;
            font-weight: 700;
        }
        .accent-color {
            color: #34495e;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Company Logo - Base64 -->
            @if(isset($logoUrl))
            <img src="{{ $logoUrl }}" alt="WinterFall Fashion" class="logo">
            @endif
            <h1 style="margin: 10px 0 0 0; {{ !isset($logoUrl) ? 'margin-top: 0;' : '' }}; color: #2c3e50;">WinterFall Fashion</h1>
            <h2 style="margin: 5px 0 0 0; font-weight: 300; font-size: 1.5em; color: #7f8c8d;">Order Confirmation</h2>
        </div>

        <div class="content">
            <div class="thank-you">
                <h3 style="margin: 0 0 10px 0; font-size: 1.8em; color: #2c3e50;">Thank You For Your Order!</h3>
                <p style="margin: 0; font-size: 1.1em; opacity: 0.9; color: #495057;">We're excited to let you know that we've received your order and it is now being processed.</p>
            </div>

            <p style="color: #495057;">Dear <strong style="color: #2c3e50;">{{ $order->customer_name }}</strong>,</p>
            
            <p style="color: #495057;">Your order has been successfully placed and is being prepared for shipment. Here are your order details:</p>

            <div class="order-details">
                <h3 class="section-title">Order Summary</h3>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                    <div>
                        <p style="margin: 5px 0; color: #495057;"><strong style="color: #2c3e50;">Order Number:</strong><br>#{{ $order->order_number }}</p>
                        <p style="margin: 5px 0; color: #495057;"><strong style="color: #2c3e50;">Order Date:</strong><br>{{ $orderDate }}</p>
                    </div>
                    <div>
                        <p style="margin: 5px 0; color: #495057;"><strong style="color: #2c3e50;">Payment Status:</strong><br><span style="color: #27ae60; font-weight: 600;">{{ ucfirst($order->payment_status) }}</span></p>
                        <p style="margin: 5px 0; color: #495057;"><strong style="color: #2c3e50;">Payment Method:</strong><br>{{ ucfirst($order->payment_method ?? 'Not specified') }}</p>
                    </div>
                </div>

                <h4 style="color: #2c3e50; margin: 25px 0 15px 0; border-bottom: 1px solid #e9ecef; padding-bottom: 8px;">Items Ordered</h4>
                
                @foreach($orderItems as $item)
                <div class="order-item">
                    <!-- Base64 Image - No error handling needed -->
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="item-image">
                    <div class="item-details">
                        <div class="item-name">{{ $item['name'] }}</div>
                        <div class="item-price">${{ number_format($item['price'], 2) }}</div>
                        <div class="item-quantity">Quantity: {{ $item['quantity'] }}</div>
                        <div class="item-subtotal">Item Total: ${{ number_format($item['total'], 2) }}</div>
                    </div>
                </div>
                @endforeach

                <div class="totals">
                    <h4 style="margin-top: 0; color: #2c3e50;">Order Totals</h4>
                    <div class="total-row">
                        <span>Subtotal:</span>
                        <span>${{ number_format($order->subtotal, 2) }}</span>
                    </div>
                    <div class="total-row">
                        <span>Shipping:</span>
                        <span>${{ number_format($order->shipping, 2) }}</span>
                    </div>
                    <div class="total-row">
                        <span>Tax:</span>
                        <span>${{ number_format($order->tax, 2) }}</span>
                    </div>
                    <div class="total-row total-final">
                        <span>Grand Total:</span>
                        <span style="color: #2c3e50; font-size: 1.2em;">${{ number_format($order->total_amount, 2) }}</span>
                    </div>
                </div>
            </div>

            <div class="shipping-info">
                <h3 style="color: #2c3e50; margin-top: 0; border-bottom: 1px solid #e9ecef; padding-bottom: 10px;">Shipping Information</h3>
                <div style="background: #ffffff; padding: 15px; border-radius: 6px; border: 1px solid #e9ecef;">
                    <p style="margin: 0; white-space: pre-line; font-size: 15px; line-height: 1.5; color: #495057;">{{ $order->shipping_address }}</p>
                    <p style="margin: 15px 0 0 0; font-size: 14px; color: #7f8c8d;">
                        <strong style="color: #2c3e50;">Phone:</strong> {{ $order->customer_phone }}<br>
                        <strong style="color: #2c3e50;">Email:</strong> {{ $order->customer_email }}
                    </p>
                </div>
            </div>

            @if($order->notes)
            <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0; border: 1px solid #e9ecef;">
                <h3 style="color: #2c3e50; margin-top: 0; border-bottom: 1px solid #e9ecef; padding-bottom: 10px;">Your Notes</h3>
                <p style="margin: 0; font-style: italic; background: #ffffff; padding: 15px; border-radius: 6px; border-left: 4px solid #95a5a6; color: #495057;">{{ $order->notes }}</p>
            </div>
            @endif

            <div class="contact-info">
                <h4 style="margin: 0 0 15px 0; color: #2c3e50;">Need Help?</h4>
                <p style="margin: 0 0 10px 0; color: #495057;">If you have any questions about your order, please contact us:</p>
                <p style="margin: 5px 0; color: #7f8c8d;">
                    📧 <strong style="color: #2c3e50;">Email:</strong> support@winterfall.com<br>
                    📞 <strong style="color: #2c3e50;">Phone:</strong> +1 (555) 123-4567<br>
                    🕒 <strong style="color: #2c3e50;">Hours:</strong> Mon-Fri 9AM-6PM EST
                </p>
            </div>

            <div class="footer">
                <p style="margin: 0 0 10px 0; color: #495057;"><strong style="color: #2c3e50;">Shipping Update:</strong> We'll send you a shipping confirmation email when your order ships.</p>
                <p style="margin: 0; color: #7f8c8d; font-size: 12px;">&copy; {{ date('Y') }} WinterFall Fashion. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>