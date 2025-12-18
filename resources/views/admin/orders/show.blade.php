@extends('admin.layout')

@section('title', 'Order Details - #' . $order->order_number)

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    <!-- Order Header -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Order #{{ $order->order_number }}</h1>
                <p class="text-gray-600 mt-1">Placed on {{ $order->created_at->format('F d, Y \a\t h:i A') }}</p>
            </div>
            <div class="flex space-x-3">
                <!-- Status Update Form -->
                <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="flex items-center space-x-2">
                    @csrf
                    <select name="status" 
                            class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg text-sm transition duration-200 font-medium">
                        Update Status
                    </button>
                </form>

                <!-- Payment Status Update Form -->
                <form action="{{ route('admin.orders.updatePaymentStatus', $order) }}" method="POST" class="flex items-center space-x-2">
                    @csrf
                    <select name="payment_status" 
                            class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="failed" {{ $order->payment_status == 'failed' ? 'selected' : '' }}>Failed</option>
                    </select>
                    <button type="submit" 
                            class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg text-sm transition duration-200 font-medium">
                        Update Payment
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Order Items -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Order Summary -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Order Items</h3>
                <div class="space-y-4">
                    @foreach($order->orderItems as $item)
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200">
                        <div class="flex items-center space-x-4">
                            @php
                                // Get the image path from the product
                                $imagePath = $item->product->image ?? null;
                                
                                // Check if image exists in public/img/products/ directory
                                if ($imagePath) {
                                    // If it's already a full path, use it directly
                                    if (str_contains($imagePath, 'img/')) {
                                        $imageUrl = asset($imagePath);
                                    } 
                                    // If it's just a filename, assume it's in img/products/
                                    else {
                                        $imageUrl = asset('img/products/' . $imagePath);
                                    }
                                } else {
                                    $imageUrl = asset('img/product/product-1.jpg'); // Default fallback image
                                }
                            @endphp
                            
                            <img src="{{ $imageUrl }}" 
                                 alt="{{ $item->product->name }}" 
                                 class="h-16 w-16 rounded-lg object-cover border border-gray-200"
                                 onerror="this.src='{{ asset('img/product/product-1.jpg') }}'">
                            
                            <div>
                                <p class="font-semibold text-gray-800">{{ $item->product->name }}</p>
                                <p class="text-sm text-gray-600">{{ $item->product->category ?? 'General' }}</p>
                                <div class="flex space-x-3 mt-1">
                                    @if($item->product->size ?? false)
                                    <span class="text-xs text-gray-500">Size: {{ $item->product->size }}</span>
                                    @endif
                                    @if($item->product->color ?? false)
                                    <span class="text-xs text-gray-500">Color: {{ $item->product->color }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-semibold text-gray-800">${{ number_format($item->unit_price, 2) }}</p>
                            <p class="text-sm text-gray-600">Qty: {{ $item->quantity }}</p>
                            <p class="font-bold text-lg text-gray-800">${{ number_format($item->total_price, 2) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Order Totals -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-semibold text-gray-800">${{ number_format($order->total_amount, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping</span>
                            <span class="font-semibold text-gray-800">$0.00</span>
                        </div>
                        <div class="flex justify-between text-lg font-bold pt-3 border-t border-gray-200">
                            <span class="text-gray-800">Total</span>
                            <span class="text-blue-600">${{ number_format($order->total_amount, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer & Shipping Information -->
        <div class="space-y-6">
            <!-- Customer Information -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Customer Information</h3>
                <div class="space-y-4">
                    <div>
                        <p class="text-sm text-gray-600 font-medium">Name</p>
                        <p class="font-semibold text-gray-800">{{ $order->customer_name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 font-medium">Email</p>
                        <p class="font-semibold text-gray-800">{{ $order->customer_email }}</p>
                    </div>
                    @if($order->customer_phone)
                    <div>
                        <p class="text-sm text-gray-600 font-medium">Phone</p>
                        <p class="font-semibold text-gray-800">{{ $order->customer_phone }}</p>
                    </div>
                    @endif
                    @if($order->user)
                    <div>
                        <p class="text-sm text-gray-600 font-medium">Registered User</p>
                        <p class="font-semibold text-gray-800">{{ $order->user->name }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Shipping Address -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Shipping Address</h3>
                <div class="space-y-2">
                    <p class="text-gray-700 whitespace-pre-line">{{ $order->shipping_address }}</p>
                </div>
            </div>

            <!-- Order Notes -->
            @if($order->notes)
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Order Notes</h3>
                <p class="text-gray-700">{{ $order->notes }}</p>
            </div>
            @endif

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
                <div class="space-y-2">
                    <a href="#" class="flex items-center space-x-3 p-3 text-blue-700 bg-blue-50 hover:bg-blue-100 rounded-lg transition duration-200">
                        <i class="fas fa-print"></i>
                        <span class="font-medium">Print Invoice</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 p-3 text-green-700 bg-green-50 hover:bg-green-100 rounded-lg transition duration-200">
                        <i class="fas fa-envelope"></i>
                        <span class="font-medium">Email Customer</span>
                    </a>
                    <a href="{{ route('admin.orders.index') }}" 
                       class="flex items-center space-x-3 p-3 text-gray-700 bg-gray-50 hover:bg-gray-100 rounded-lg transition duration-200">
                        <i class="fas fa-arrow-left"></i>
                        <span class="font-medium">Back to Orders</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection