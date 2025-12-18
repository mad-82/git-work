<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('partials.header')
    
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1>Shopping Cart</h1>
                <p>Cart functionality will be implemented here.</p>
                
                @if(auth()->check() && auth()->user()->cartItems()->count() > 0)
                    <div class="alert alert-info">
                        You have {{ auth()->user()->cartItems()->count() }} items in your cart.
                    </div>
                @else
                    <div class="alert alert-warning">
                        Your cart is empty.
                    </div>
                    <a href="{{ route('shop') }}" class="btn btn-primary">Continue Shopping</a>
                @endif
            </div>
        </div>
    </div>
</body>
</html>