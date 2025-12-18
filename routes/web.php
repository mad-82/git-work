<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

// ✅ WELCOME PAGE AS FIRST PAGE (Default Home Page)
Route::get('/', function () {
    try {
        $featuredProducts = Product::where('active', true)
                                 ->where('featured', true)
                                 ->latest()
                                 ->take(8)
                                 ->get();

        if ($featuredProducts->count() === 0) {
            $featuredProducts = Product::where('active', true)
                                     ->latest()
                                     ->take(8)
                                     ->get();
        }

        $newArrivals = Product::where('active', true)
                            ->latest()
                            ->take(8)
                            ->get();

        $hotSales = Product::where('active', true)
                         ->whereNotNull('sale_price')
                         ->where('sale_price', '>', 0)
                         ->latest()
                         ->take(8)
                         ->get();

        return view('welcome', compact('featuredProducts', 'newArrivals', 'hotSales'));
        
    } catch (\Exception $e) {
        \Log::error('Welcome page error: ' . $e->getMessage());
        
        return view('welcome', [
            'featuredProducts' => collect(),
            'newArrivals' => collect(),
            'hotSales' => collect()
        ]);
    }
})->name('home');

// ✅ REGISTER ROUTES
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// ✅ LOGIN ROUTE
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Static Pages Routes
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

// Order success page
Route::get('/order-success', function (Request $request) {
    $orderNumber = $request->get('order_number');
    $orderId = $request->get('order_id');
    
    return view('order-success', compact('orderNumber', 'orderId'));
})->name('order.success');

// Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

// Email Resend Route
Route::post('/order/{order}/resend-email', [CheckoutController::class, 'resendConfirmationEmail'])->name('order.resend-email');

// ✅ CONTACT FORM ROUTE
Route::post('/contact/submit', [AdminController::class, 'submitContactForm'])->name('contact.submit');

// Frontend Product APIs
Route::get('/api/products', [AdminController::class, 'frontendProducts'])->name('api.products');
Route::get('/api/products/featured', [AdminController::class, 'featuredProducts'])->name('api.products.featured');

// Cart Routes
Route::get('/cart', function () {
    return view('cart');
})->name('cart');

// Wishlist Routes
Route::get('/wishlist', function () {
    return view('wishlist');
})->name('wishlist');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
   
    // Products Management
    Route::get('/products', [AdminController::class, 'productsIndex'])->name('admin.products.index');
    Route::get('/products/create', [AdminController::class, 'productsCreate'])->name('admin.products.create');
    Route::post('/products', [AdminController::class, 'productsStore'])->name('admin.products.store');
    Route::get('/products/{product}', [AdminController::class, 'productsShow'])->name('admin.products.show');
    Route::get('/products/{product}/edit', [AdminController::class, 'productsEdit'])->name('admin.products.edit');
    Route::put('/products/{product}', [AdminController::class, 'productsUpdate'])->name('admin.products.update');
    Route::delete('/products/{product}', [AdminController::class, 'productsDestroy'])->name('admin.products.destroy');
    
    // Product Actions
    Route::post('/products/{product}/toggle-status', [AdminController::class, 'toggleProductStatus'])->name('admin.products.toggle-status');
    Route::post('/products/bulk-action', [AdminController::class, 'productsBulkAction'])->name('admin.products.bulk-action');
    
    // Orders Management
    Route::get('/orders', [AdminController::class, 'ordersIndex'])->name('admin.orders.index');
    Route::get('/orders/{order}', [AdminController::class, 'ordersShow'])->name('admin.orders.show');
    Route::post('/orders/{order}/update-status', [AdminController::class, 'updateOrderStatus'])->name('admin.orders.updateStatus');
    Route::post('/orders/{order}/update-payment-status', [AdminController::class, 'updateOrderPaymentStatus'])->name('admin.orders.updatePaymentStatus');
    Route::delete('/orders/{order}', [AdminController::class, 'ordersDestroy'])->name('admin.orders.destroy');
    
    // ✅ CONTACT MANAGEMENT ROUTES
    Route::get('/contacts', [AdminController::class, 'contactsIndex'])->name('admin.contacts.index');
    Route::get('/contacts/{id}', [AdminController::class, 'contactsShow'])->name('admin.contacts.show');
    Route::post('/contacts/{id}/read', [AdminController::class, 'markContactAsRead'])->name('admin.contacts.mark-read');
    Route::post('/contacts/{id}/replied', [AdminController::class, 'markContactAsReplied'])->name('admin.contacts.mark-replied');
    Route::post('/contacts/{id}/toggle-important', [AdminController::class, 'toggleContactImportant'])->name('admin.contacts.toggle-important');
    Route::delete('/contacts/{id}', [AdminController::class, 'contactsDestroy'])->name('admin.contacts.destroy');
    Route::post('/contacts/bulk-action', [AdminController::class, 'contactsBulkAction'])->name('admin.contacts.bulk-action');
    Route::get('/contacts/counts', [AdminController::class, 'getContactCounts'])->name('admin.contacts.counts');
    
    // Profile Routes
    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('admin.profile');
    
    Route::put('/profile', function () {
        return back()->with('success', 'Profile updated successfully!');
    })->name('admin.profile.update');
    
    Route::put('/password', function () {
        return back()->with('success', 'Password updated successfully!');
    })->name('admin.password.update');
    
    // Settings Routes
    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');
    
    Route::put('/settings', function () {
        return back()->with('success', 'Settings updated successfully!');
    })->name('admin.settings.update');
});

// User Profile Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/orders', [ProfileController::class, 'orders'])->name('profile.orders');
    Route::get('/profile/wishlist', [ProfileController::class, 'wishlist'])->name('profile.wishlist');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Password change route
    Route::get('/password/change', function () {
        return view('auth.change-password');
    })->name('password.change');
    
    Route::post('/password/change', function (Request $request) {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', 'Password updated successfully.');
    });
    
    // Cart and Wishlist routes
    Route::get('/cart', function () {
        return view('cart');
    })->name('cart');
    
    Route::get('/wishlist', function () {
        return view('wishlist');
    })->name('wishlist');
});

require __DIR__.'/auth.php';