<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Contact; // ✅ ADDED
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail; // ✅ ADDED

class AdminController extends Controller
{
    public function dashboard()
    {
        try {
            // Total statistics
            $totalSales = Order::where('payment_status', 'paid')->sum('total_amount');
            $totalOrders = Order::count();
            $totalProducts = Product::count();
            $totalCustomers = User::count();
            
            // ✅ NEW: Contact statistics for dashboard
            $totalContacts = Contact::count();
            $unreadContacts = Contact::where('status', 'unread')->count();
            $importantContacts = Contact::where('is_important', true)->count();

            // ✅ FIXED: Recent orders with proper relationships
            $recentOrders = Order::with(['user', 'orderItems.product'])
                                ->latest()
                                ->take(5)
                                ->get();

            // Sales chart data (last 7 days)
            $salesData = Order::where('payment_status', 'paid')
                ->where('created_at', '>=', now()->subDays(7))
                ->selectRaw('DATE(created_at) as date, SUM(total_amount) as total')
                ->groupBy('date')
                ->orderBy('date')
                ->get();

            // ✅ FIXED: Top selling products query
            $topProducts = Product::with(['orderItems'])
                ->withSum('orderItems', 'quantity')
                ->orderByDesc('order_items_sum_quantity')
                ->take(5)
                ->get();

            // ✅ DEBUG: Log data for troubleshooting
            Log::info('Dashboard Data Loaded', [
                'recent_orders_count' => $recentOrders->count(),
                'top_products_count' => $topProducts->count(),
                'total_orders' => $totalOrders
            ]);

            return view('admin.dashboard', compact(
                'totalSales',
                'totalOrders',
                'totalProducts',
                'totalCustomers',
                'totalContacts',
                'unreadContacts',
                'importantContacts',
                'recentOrders',
                'salesData',
                'topProducts'
            ));

        } catch (\Exception $e) {
            Log::error('Dashboard Error: ' . $e->getMessage());
            
            // Fallback with empty data
            return view('admin.dashboard', [
                'totalSales' => 0,
                'totalOrders' => 0,
                'totalProducts' => 0,
                'totalCustomers' => 0,
                'totalContacts' => 0,
                'unreadContacts' => 0,
                'importantContacts' => 0,
                'recentOrders' => collect(),
                'salesData' => collect(),
                'topProducts' => collect(),
            ]);
        }
    }

    // ============================
    // CONTACT MANAGEMENT FUNCTIONS
    // ============================

    /**
     * ✅ NEW: Contact form submission
     */
    public function submitContactForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:500',
            'message' => 'required|string'
        ]);

        try {
            // Create contact record
            $contact = Contact::create($validated);

            Log::info('Contact form submitted:', [
                'id' => $contact->id,
                'name' => $contact->name,
                'email' => $contact->email
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your message has been sent successfully.'
            ]);

        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an error sending your message. Please try again.'
            ], 500);
        }
    }

    /**
     * ✅ NEW: Display all contact messages
     */
    public function contactsIndex()
    {
        try {
            $contacts = Contact::latest()->paginate(10);
            
            $totalContacts = Contact::count();
            $unreadContacts = Contact::where('status', 'unread')->count();
            $importantContacts = Contact::where('is_important', true)->count();
            $repliedContacts = Contact::where('status', 'replied')->count();

            return view('admin.contacts.index', compact(
                'contacts', 
                'totalContacts',
                'unreadContacts',
                'importantContacts',
                'repliedContacts'
            ));
        } catch (\Exception $e) {
            Log::error('Error fetching contacts: ' . $e->getMessage());
            return back()->with('error', 'Error loading contacts: ' . $e->getMessage());
        }
    }

    /**
     * ✅ NEW: Show single contact message
     */
    public function contactsShow($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            return response()->json($contact);
        } catch (\Exception $e) {
            Log::error('Error fetching contact: ' . $e->getMessage());
            return response()->json(['error' => 'Contact not found'], 404);
        }
    }

    /**
     * ✅ NEW: Mark contact as read
     */
    public function markContactAsRead($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->update(['status' => 'read']);
            
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Error marking contact as read: ' . $e->getMessage());
            return response()->json(['error' => 'Error updating contact'], 500);
        }
    }

    /**
     * ✅ NEW: Mark contact as replied
     */
    public function markContactAsReplied($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->update(['status' => 'replied']);
            
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Error marking contact as replied: ' . $e->getMessage());
            return response()->json(['error' => 'Error updating contact'], 500);
        }
    }

    /**
     * ✅ NEW: Toggle important status
     */
    public function toggleContactImportant($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->update(['is_important' => !$contact->is_important]);
            
            return response()->json([
                'success' => true,
                'is_important' => $contact->is_important
            ]);
        } catch (\Exception $e) {
            Log::error('Error toggling contact important status: ' . $e->getMessage());
            return response()->json(['error' => 'Error updating contact'], 500);
        }
    }

    /**
     * ✅ NEW: Delete contact message
     */
    public function contactsDestroy($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Error deleting contact: ' . $e->getMessage());
            return response()->json(['error' => 'Error deleting contact'], 500);
        }
    }

    /**
     * ✅ NEW: Bulk actions for contacts
     */
    public function contactsBulkAction(Request $request)
    {
        $action = $request->input('action');
        $contactIds = $request->input('contact_ids', []);

        if (empty($contactIds)) {
            return back()->with('error', 'Please select contacts to perform action.');
        }

        try {
            switch ($action) {
                case 'mark_read':
                    Contact::whereIn('id', $contactIds)->update(['status' => 'read']);
                    $message = 'Selected contacts marked as read!';
                    break;
                    
                case 'mark_replied':
                    Contact::whereIn('id', $contactIds)->update(['status' => 'replied']);
                    $message = 'Selected contacts marked as replied!';
                    break;
                    
                case 'mark_important':
                    Contact::whereIn('id', $contactIds)->update(['is_important' => true]);
                    $message = 'Selected contacts marked as important!';
                    break;
                    
                case 'unmark_important':
                    Contact::whereIn('id', $contactIds)->update(['is_important' => false]);
                    $message = 'Selected contacts unmarked as important!';
                    break;
                    
                case 'delete':
                    Contact::whereIn('id', $contactIds)->delete();
                    $message = 'Selected contacts deleted successfully!';
                    break;
                    
                default:
                    return back()->with('error', 'Invalid action selected.');
            }

            return back()->with('success', $message);
        } catch (\Exception $e) {
            Log::error('Contact bulk action error: ' . $e->getMessage());
            return back()->with('error', 'Error performing bulk action: ' . $e->getMessage());
        }
    }

    /**
     * ✅ NEW: Get contact counts for dashboard
     */
    public function getContactCounts()
    {
        try {
            $totalContacts = Contact::count();
            $unreadContacts = Contact::where('status', 'unread')->count();
            $importantContacts = Contact::where('is_important', true)->count();

            return response()->json([
                'total' => $totalContacts,
                'unread' => $unreadContacts,
                'important' => $importantContacts
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching contact counts: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to load contact counts'], 500);
        }
    }

    // ============================
    // ORDER MANAGEMENT FUNCTIONS
    // ============================

    /**
     * Display all orders
     */
    public function ordersIndex()
    {
        try {
            $orders = Order::with(['user', 'orderItems.product'])
                          ->latest()
                          ->paginate(10);
            
            return view('admin.orders.index', compact('orders'));
        } catch (\Exception $e) {
            Log::error('Error fetching orders: ' . $e->getMessage());
            return back()->with('error', 'Error loading orders: ' . $e->getMessage());
        }
    }

    /**
     * Show single order details
     */
    public function ordersShow(Order $order)
    {
        try {
            $order->load(['user', 'orderItems.product']);
            return view('admin.orders.show', compact('order'));
        } catch (\Exception $e) {
            Log::error('Error fetching order details: ' . $e->getMessage());
            return back()->with('error', 'Error loading order details: ' . $e->getMessage());
        }
    }

    /**
     * Update order status
     */
    public function updateOrderStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,shipped,delivered,cancelled'
        ]);

        try {
            $order->update(['status' => $validated['status']]);
            
            return redirect()->route('admin.orders.index')
                            ->with('success', 'Order status updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating order status: ' . $e->getMessage());
            return back()->with('error', 'Error updating order status: ' . $e->getMessage());
        }
    }

    /**
     * Update payment status
     */
    public function updateOrderPaymentStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'payment_status' => 'required|in:pending,paid,failed,refunded'
        ]);

        try {
            $order->update(['payment_status' => $validated['payment_status']]);
            
            return redirect()->route('admin.orders.index')
                            ->with('success', 'Payment status updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating payment status: ' . $e->getMessage());
            return back()->with('error', 'Error updating payment status: ' . $e->getMessage());
        }
    }

    /**
     * Delete order
     */
    public function ordersDestroy(Order $order)
    {
        try {
            // Delete related order items first
            $order->orderItems()->delete();
            $order->delete();

            return redirect()->route('admin.orders.index')
                            ->with('success', 'Order deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting order: ' . $e->getMessage());
            return back()->with('error', 'Error deleting order: ' . $e->getMessage());
        }
    }

    /**
     * ✅ FIXED: Bulk actions for orders
     */
    public function ordersBulkAction(Request $request)
    {
        $action = $request->input('action');
        $orderIds = $request->input('order_ids', []);

        if (empty($orderIds)) {
            return back()->with('error', 'Please select orders to perform action.');
        }

        try {
            switch ($action) {
                case 'delete':
                    // Delete order items first
                    OrderItem::whereIn('order_id', $orderIds)->delete();
                    Order::whereIn('id', $orderIds)->delete();
                    $message = 'Selected orders deleted successfully!';
                    break;
                    
                case 'mark_paid':
                    Order::whereIn('id', $orderIds)->update(['payment_status' => 'paid']);
                    $message = 'Selected orders marked as paid!';
                    break;
                    
                case 'mark_delivered':
                    Order::whereIn('id', $orderIds)->update(['status' => 'delivered']);
                    $message = 'Selected orders marked as delivered!';
                    break;
                    
                case 'mark_pending':
                    Order::whereIn('id', $orderIds)->update(['status' => 'pending']);
                    $message = 'Selected orders marked as pending!';
                    break;
                    
                default:
                    return back()->with('error', 'Invalid action selected.');
            }

            return back()->with('success', $message);
        } catch (\Exception $e) {
            Log::error('Order bulk action error: ' . $e->getMessage());
            return back()->with('error', 'Error performing bulk action: ' . $e->getMessage());
        }
    }

    // ============================
    // PRODUCT MANAGEMENT FUNCTIONS
    // ============================

    /**
     * Display all products
     */
    public function productsIndex()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show product create form
     */
    public function productsCreate()
    {
        $categories = ['Jackets', 'Bags', 'Shoes', 'Clothing', 'Accessories', 'T-Shirts', 'Dresses', 'Jeans'];
        $sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'One Size'];
        $colors = ['Black', 'White', 'Red', 'Blue', 'Green', 'Yellow', 'Pink', 'Purple', 'Gray', 'Brown'];
        
        return view('admin.products.create', compact('categories', 'sizes', 'colors'));
    }

    /**
     * Store new product - ✅ UPDATED TO MATCH PRODUCT MODEL
     */
    public function productsStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'category' => 'required|string|max:255',
            'size' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:50',
            'stock_quantity' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'featured' => 'boolean',
            'tags' => 'nullable|string'
        ]);

        try {
            // ✅ UPDATED: Handle image upload - sync with Product Model
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                
                // Generate clean filename
                $imageName = 'product_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                
                // ✅ UPDATED: Store in public/img/products/ (matches Product Model)
                $image->move(public_path('img/products'), $imageName);
                
                $validated['image'] = $imageName;
                
                Log::info('🖼️ Image Uploaded:', [
                    'original_name' => $image->getClientOriginalName(),
                    'stored_name' => $imageName,
                    'storage_path' => public_path('img/products/' . $imageName),
                    'web_url' => asset('img/products/' . $imageName)
                ]);
            } else {
                return back()->with('error', 'Please select a product image.')->withInput();
            }

            $validated['active'] = true;
            $validated['featured'] = $request->has('featured');

            $product = Product::create($validated);

            Log::info('✅ PRODUCT CREATED SUCCESSFULLY:', [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'image_url' => $product->imageUrl // Using accessor
            ]);

            return redirect()->route('admin.products.index')
                            ->with('success', 'Product created successfully with image!');

        } catch (\Exception $e) {
            Log::error('❌ Error creating product: ' . $e->getMessage());
            return back()->with('error', 'Error creating product: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Show single product
     */
    public function productsShow(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show product edit form
     */
    public function productsEdit(Product $product)
    {
        $categories = ['Jackets', 'Bags', 'Shoes', 'Clothing', 'Accessories', 'T-Shirts', 'Dresses', 'Jeans'];
        $sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'One Size'];
        $colors = ['Black', 'White', 'Red', 'Blue', 'Green', 'Yellow', 'Pink', 'Purple', 'Gray', 'Brown'];
        
        return view('admin.products.edit', compact('product', 'categories', 'sizes', 'colors'));
    }

    /**
     * Update product - ✅ UPDATED TO MATCH PRODUCT MODEL
     */
    public function productsUpdate(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'category' => 'required|string|max:255',
            'size' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:50',
            'stock_quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'featured' => 'boolean',
            'active' => 'boolean',
            'tags' => 'nullable|string'
        ]);

        try {
            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image from correct location
                if ($product->image) {
                    // Check both possible locations
                    $pathsToCheck = [
                        public_path('img/products/' . $product->image),
                        public_path('img/product/' . $product->image)
                    ];
                    
                    foreach ($pathsToCheck as $path) {
                        if (file_exists($path)) {
                            unlink($path);
                            Log::info('🗑️ Old image deleted:', ['path' => $path]);
                        }
                    }
                }
                
                // Upload new image
                $image = $request->file('image');
                $imageName = 'product_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('img/products'), $imageName);
                $validated['image'] = $imageName;
                
                Log::info('🖼️ New image uploaded:', ['name' => $imageName]);
            }

            $validated['featured'] = $request->has('featured');
            $validated['active'] = $request->has('active');

            $product->update($validated);

            Log::info('✅ PRODUCT UPDATED:', [
                'id' => $product->id,
                'name' => $product->name,
                'image_updated' => $request->hasFile('image'),
                'image_url' => $product->imageUrl
            ]);

            return redirect()->route('admin.products.index')
                            ->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            Log::error('❌ Error updating product: ' . $e->getMessage());
            return back()->with('error', 'Error updating product: ' . $e->getMessage());
        }
    }

    /**
     * Delete product - ✅ UPDATED TO MATCH PRODUCT MODEL
     */
    public function productsDestroy(Product $product)
    {
        try {
            // Delete image from correct locations
            if ($product->image) {
                $pathsToCheck = [
                    public_path('img/products/' . $product->image),
                    public_path('img/product/' . $product->image)
                ];
                
                foreach ($pathsToCheck as $path) {
                    if (file_exists($path)) {
                        unlink($path);
                        Log::info('🗑️ Product image deleted:', ['path' => $path]);
                    }
                }
            }

            $product->delete();

            Log::info('✅ PRODUCT DELETED:', ['id' => $product->id, 'name' => $product->name]);

            return redirect()->route('admin.products.index')
                            ->with('success', 'Product deleted successfully!');
        } catch (\Exception $e) {
            Log::error('❌ Error deleting product: ' . $e->getMessage());
            return back()->with('error', 'Error deleting product: ' . $e->getMessage());
        }
    }

    /**
     * Frontend API - Get all active products
     */
    public function frontendProducts()
    {
        try {
            $products = Product::where('active', true)->latest()->get();
            return response()->json($products);
        } catch (\Exception $e) {
            Log::error('Error fetching frontend products: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to load products'], 500);
        }
    }

    /**
     * Frontend API - Get featured products
     */
    public function featuredProducts()
    {
        try {
            $products = Product::where('active', true)
                              ->where('featured', true)
                              ->latest()
                              ->take(8)
                              ->get();
            
            return response()->json($products);
        } catch (\Exception $e) {
            Log::error('Error fetching featured products: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to load featured products'], 500);
        }
    }

    /**
     * ✅ FIXED: Frontend API - Get single product
     */
    public function frontendProductShow($id)
    {
        try {
            $product = Product::where('active', true)->findOrFail($id);
            return response()->json($product);
        } catch (\Exception $e) {
            Log::error('Error fetching product: ' . $e->getMessage());
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    /**
     * Toggle product status (active/inactive)
     */
    public function toggleProductStatus(Product $product)
    {
        try {
            $product->update([
                'active' => !$product->active
            ]);

            $status = $product->active ? 'activated' : 'deactivated';
            return back()->with('success', "Product {$status} successfully!");
        } catch (\Exception $e) {
            Log::error('Error toggling product status: ' . $e->getMessage());
            return back()->with('error', 'Error updating product status: ' . $e->getMessage());
        }
    }

    /**
     * Bulk actions for products - ✅ UPDATED TO MATCH PRODUCT MODEL
     */
    public function productsBulkAction(Request $request)
    {
        $action = $request->input('action');
        $productIds = $request->input('product_ids', []);

        if (empty($productIds)) {
            return back()->with('error', 'Please select products to perform action.');
        }

        try {
            switch ($action) {
                case 'activate':
                    Product::whereIn('id', $productIds)->update(['active' => true]);
                    $message = 'Selected products activated successfully!';
                    break;
                    
                case 'deactivate':
                    Product::whereIn('id', $productIds)->update(['active' => false]);
                    $message = 'Selected products deactivated successfully!';
                    break;
                    
                case 'delete':
                    // Delete images first from correct locations
                    $products = Product::whereIn('id', $productIds)->get();
                    foreach ($products as $product) {
                        if ($product->image) {
                            $pathsToCheck = [
                                public_path('img/products/' . $product->image),
                                public_path('img/product/' . $product->image)
                            ];
                            
                            foreach ($pathsToCheck as $path) {
                                if (file_exists($path)) {
                                    unlink($path);
                                }
                            }
                        }
                    }
                    Product::whereIn('id', $productIds)->delete();
                    $message = 'Selected products deleted successfully!';
                    break;
                    
                case 'featured':
                    Product::whereIn('id', $productIds)->update(['featured' => true]);
                    $message = 'Selected products marked as featured!';
                    break;
                    
                case 'unfeatured':
                    Product::whereIn('id', $productIds)->update(['featured' => false]);
                    $message = 'Selected products unmarked as featured!';
                    break;
                    
                default:
                    return back()->with('error', 'Invalid action selected.');
            }

            return back()->with('success', $message);
        } catch (\Exception $e) {
            Log::error('Product bulk action error: ' . $e->getMessage());
            return back()->with('error', 'Error performing bulk action: ' . $e->getMessage());
        }
    }

    /**
     * ✅ FIXED: Get dashboard analytics data
     */
    public function getAnalytics()
    {
        try {
            // Monthly sales data
            $monthlySales = Order::where('payment_status', 'paid')
                ->whereYear('created_at', now()->year)
                ->selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            // Top categories
            $topCategories = Product::select('category', DB::raw('COUNT(*) as count'))
                ->groupBy('category')
                ->orderByDesc('count')
                ->take(5)
                ->get();

            return response()->json([
                'monthly_sales' => $monthlySales,
                'top_categories' => $topCategories
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching analytics: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to load analytics'], 500);
        }
    }

    /**
     * ✅ FIXED: Debug route for image testing - matches Product Model
     */
    public function debugImages()
    {
        $products = Product::all();
        
        $debugInfo = [];
        foreach($products as $product) {
            $debugInfo[] = [
                'id' => $product->id,
                'name' => $product->name,
                'database_image' => $product->image,
                'image_url_accessor' => $product->imageUrl,
                'public_img_products_path' => public_path('img/products/' . $product->image),
                'public_img_products_exists' => file_exists(public_path('img/products/' . $product->image)),
                'public_img_product_path' => public_path('img/product/' . $product->image),
                'public_img_product_exists' => file_exists(public_path('img/product/' . $product->image)),
                'web_url_products' => asset('img/products/' . $product->image),
                'web_url_product' => asset('img/product/' . $product->image)
            ];
        }
        
        return response()->json($debugInfo);
    }
}