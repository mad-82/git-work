@extends('admin.layout')

@section('title', $product->name)

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <!-- Product Header -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 border-b border-gray-200">
            <div class="flex justify-between items-start">
                <div class="flex items-center space-x-4">
                    @if($product->image)
                    <img src="{{ asset('img/products/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="h-16 w-16 rounded-lg object-cover border border-gray-200">
                    @else
                    <div class="h-16 w-16 bg-gray-100 rounded-lg flex items-center justify-center border border-gray-200">
                        <i class="fas fa-tshirt text-gray-400 text-xl"></i>
                    </div>
                    @endif
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">{{ $product->name }}</h1>
                        <p class="text-gray-600">{{ $product->category }}</p>
                    </div>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('admin.products.edit', $product) }}" 
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition duration-200 font-medium flex items-center">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.products.index') }}" 
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-200 font-medium flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i>Back
                    </a>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Product Image & Details -->
                <div class="lg:col-span-2">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Product Image -->
                        <div>
                            @if($product->image)
                            <img src="{{ asset('img/products/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-64 object-cover rounded-xl border border-gray-200">
                            @else
                            <div class="w-full h-64 bg-gray-100 rounded-xl flex items-center justify-center border border-gray-200">
                                <i class="fas fa-tshirt text-gray-400 text-6xl"></i>
                            </div>
                            @endif
                        </div>

                        <!-- Product Details -->
                        <div class="space-y-6">
                            <!-- Pricing -->
                            <div class="bg-blue-50 rounded-lg p-4 border border-blue-100">
                                <div class="flex items-center space-x-4">
                                    @if($product->sale_price)
                                    <div>
                                        <p class="text-2xl font-bold text-green-600">${{ number_format($product->sale_price, 2) }}</p>
                                        <p class="text-lg text-gray-500 line-through">${{ number_format($product->price, 2) }}</p>
                                    </div>
                                    <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-medium">SALE</span>
                                    @else
                                    <p class="text-2xl font-bold text-gray-800">${{ number_format($product->price, 2) }}</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Stock & Status -->
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                    <p class="text-sm text-gray-600 font-medium">Stock Quantity</p>
                                    <p class="text-xl font-bold {{ $product->stock_quantity > 10 ? 'text-green-600' : ($product->stock_quantity > 0 ? 'text-yellow-600' : 'text-red-600') }}">
                                        {{ $product->stock_quantity }}
                                    </p>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                    <p class="text-sm text-gray-600 font-medium">Status</p>
                                    <p class="text-xl font-bold {{ $product->active ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $product->active ? 'Active' : 'Inactive' }}
                                    </p>
                                </div>
                            </div>

                            <!-- Attributes -->
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800 mb-3">Product Attributes</h3>
                                <div class="space-y-3">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Size:</span>
                                        <span class="font-semibold text-gray-800">{{ $product->size ?? 'N/A' }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Color:</span>
                                        <span class="font-semibold text-gray-800">{{ $product->color ?? 'N/A' }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Featured:</span>
                                        <span class="font-semibold {{ $product->featured ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $product->featured ? 'Yes' : 'No' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-6 bg-gray-50 rounded-lg p-6 border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Description</h3>
                        <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                    </div>
                </div>

                <!-- Product Stats -->
                <div class="space-y-6">
                    <!-- Sales Stats -->
                    <div class="bg-white rounded-lg p-6 border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Sales Performance</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-shopping-bag text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-800">Total Orders</p>
                                    </div>
                                </div>
                                <span class="text-xl font-bold text-gray-800">{{ $product->orderItems->count() }}</span>
                            </div>

                            <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-chart-line text-green-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-800">Total Sold</p>
                                    </div>
                                </div>
                                <span class="text-xl font-bold text-gray-800">{{ $product->orderItems->sum('quantity') }}</span>
                            </div>

                            <div class="flex justify-between items-center p-3 bg-purple-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-dollar-sign text-purple-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-800">Revenue</p>
                                    </div>
                                </div>
                                <span class="text-xl font-bold text-green-600">${{ number_format($product->orderItems->sum('total_price'), 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white rounded-lg p-6 border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
                        <div class="space-y-2">
                            <a href="{{ route('admin.products.edit', $product) }}" 
                               class="flex items-center space-x-3 p-3 text-yellow-700 bg-yellow-50 hover:bg-yellow-100 rounded-lg transition duration-200">
                                <i class="fas fa-edit"></i>
                                <span class="font-medium">Edit Product</span>
                            </a>
                            <a href="#" 
                               class="flex items-center space-x-3 p-3 text-blue-700 bg-blue-50 hover:bg-blue-100 rounded-lg transition duration-200">
                                <i class="fas fa-chart-bar"></i>
                                <span class="font-medium">View Analytics</span>
                            </a>
                            <a href="#" 
                               class="flex items-center space-x-3 p-3 text-green-700 bg-green-50 hover:bg-green-100 rounded-lg transition duration-200">
                                <i class="fas fa-copy"></i>
                                <span class="font-medium">Duplicate Product</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection