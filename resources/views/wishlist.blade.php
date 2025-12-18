<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('partials.header')
    
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1>My Wishlist</h1>
                <p>Wishlist functionality will be implemented here.</p>
                
                @if(auth()->check() && auth()->user()->wishlistItems()->count() > 0)
                    <div class="alert alert-info">
                        You have {{ auth()->user()->wishlistItems()->count() }} items in your wishlist.
                    </div>
                @else
                    <div class="alert alert-warning">
                        Your wishlist is empty.
                    </div>
                    <a href="{{ route('shop') }}" class="btn btn-primary">Browse Products</a>
                @endif
            </div>
        </div>
    </div>
</body>
</html>