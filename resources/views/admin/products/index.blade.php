@extends('admin.layout')

@section('title', 'Products Management')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Products Management</h1>
            <p class="text-gray-600 mt-1">Manage your product catalog and inventory</p>
        </div>
        <a href="{{ route('admin.products.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200 font-medium flex items-center">
            <i class="fas fa-plus mr-2"></i>Add New Product
        </a>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Product</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Category</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Price</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Stock</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($products as $product)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                @if($product->image)
                                <img src="{{ asset('img/products/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="h-12 w-12 rounded-lg object-cover border border-gray-200">
                                @else
                                <div class="h-12 w-12 bg-gray-100 rounded-lg flex items-center justify-center border border-gray-200">
                                    <i class="fas fa-tshirt text-gray-400"></i>
                                </div>
                                @endif
                                <div>
                                    <p class="font-medium text-gray-800">{{ $product->name }}</p>
                                    <p class="text-sm text-gray-500">{{ Str::limit($product->description, 50) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                                {{ $product->category }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="space-y-1">
                                <p class="font-semibold text-gray-800">${{ number_format($product->price, 2) }}</p>
                                @if($product->sale_price)
                                <p class="text-green-600 text-sm font-medium">${{ number_format($product->sale_price, 2) }}</p>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                {{ $product->stock_quantity > 10 ? 'bg-green-100 text-green-800' : ($product->stock_quantity > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ $product->stock_quantity }} in stock
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2">
                                <span class="px-3 py-1 rounded-full text-xs font-medium
                                    {{ $product->active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $product->active ? 'Active' : 'Inactive' }}
                                </span>
                                @if($product->featured)
                                <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-medium">Featured</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('admin.products.show', $product) }}" 
                                   class="bg-blue-100 hover:bg-blue-200 text-blue-600 p-2 rounded-lg transition duration-200">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.products.edit', $product) }}" 
                                   class="bg-yellow-100 hover:bg-yellow-200 text-yellow-600 p-2 rounded-lg transition duration-200">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-100 hover:bg-red-200 text-red-600 p-2 rounded-lg transition duration-200">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="text-gray-400">
                                <i class="fas fa-tshirt text-4xl mb-4"></i>
                                <p class="text-lg">No products found</p>
                                <p class="text-sm mt-1">Get started by adding your first product</p>
                                <a href="{{ route('admin.products.create') }}" 
                                   class="inline-block mt-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm transition duration-200">
                                    Add New Product
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
            {{ $products->links() }}
        </div>
        @endif
    </div>
</div>
@endsection