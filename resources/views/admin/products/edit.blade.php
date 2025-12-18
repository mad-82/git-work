@extends('admin.layout')

@section('title', 'Edit Product - ' . $product->name)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Edit Product</h1>
                <p class="text-gray-600 mt-1">Update product information</p>
            </div>
            <a href="{{ route('admin.products.index') }}" 
               class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition duration-200 font-medium flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>Back to Products
            </a>
        </div>

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Basic Information -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" 
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               required>
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                        <select name="category" 
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category }}" {{ old('category', $product->category) == $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Price ($) *</label>
                        <input type="number" name="price" value="{{ old('price', $product->price) }}" step="0.01" min="0"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               required>
                        @error('price')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Sale Price ($)</label>
                        <input type="number" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}" step="0.01" min="0"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="Optional">
                        @error('sale_price')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Size</label>
                        <select name="size" 
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Select Size</option>
                            @foreach($sizes as $size)
                            <option value="{{ $size }}" {{ old('size', $product->size) == $size ? 'selected' : '' }}>
                                {{ $size }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Color</label>
                        <select name="color" 
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Select Color</option>
                            @foreach($colors as $color)
                            <option value="{{ $color }}" {{ old('color', $product->color) == $color ? 'selected' : '' }}>
                                {{ $color }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity *</label>
                        <input type="number" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" min="0"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               required>
                        @error('stock_quantity')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Product Image</label>
                        @if($product->image)
                        <div class="mb-3">
                            <img src="{{ asset('img/products/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="h-20 w-20 object-cover rounded-lg border border-gray-200">
                            <p class="text-sm text-gray-500 mt-1">Current Image</p>
                        </div>
                        @endif
                        <input type="file" name="image" 
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                               accept="image/*">
                        @error('image')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                <textarea name="description" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                          required>{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Features -->
            <div class="mt-6 space-y-3">
                <label class="flex items-center">
                    <input type="checkbox" name="featured" value="1" 
                           {{ old('featured', $product->featured) ? 'checked' : '' }}
                           class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-gray-700 font-medium">Featured Product</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" name="active" value="1" 
                           {{ old('active', $product->active) ? 'checked' : '' }}
                           class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-gray-700 font-medium">Active Product</span>
                </label>
            </div>

            <!-- Submit Buttons -->
            <div class="mt-8 flex justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.products.index') }}" 
                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-lg transition duration-200 font-medium">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition duration-200 font-medium flex items-center">
                    <i class="fas fa-save mr-2"></i>Update Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection