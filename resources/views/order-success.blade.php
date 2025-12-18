<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success - WinterFall Fashion</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        .success-section {
            padding: 100px 0;
            text-align: center;
        }
        .success-icon {
            font-size: 80px;
            color: #28a745;
            margin-bottom: 30px;
        }
        .order-details {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 8px;
            margin: 30px auto;
            max-width: 500px;
        }
    </style>
</head>
<body>
    <!-- Include your header here -->
    
    <section class="success-section">
        <div class="container">
            <div class="success-icon">
                <i class="fa fa-check-circle"></i>
            </div>
            <h1>Thank You for Your Order!</h1>
            <p>Your order has been placed successfully and a confirmation email has been sent to your email address.</p>
            
            <div class="order-details">
                <h3>Order Details</h3>
              <p><strong>Order Number:</strong> {{ request('order_number') ?? 'N/A' }}</p>
<p><strong>Order ID:</strong> {{ request('order_id') ?? 'N/A' }}</p>
                <p>We'll send you a shipping confirmation email when your order ships.</p>
            </div>
            
            <a href="./" class="btn btn-primary">Continue Shopping</a>
        </div>
    </section>
    
    <!-- Include your footer here -->
</body>
</html>