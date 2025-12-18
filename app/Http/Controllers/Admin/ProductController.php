<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = [
            'Jackets',
            'Sweaters',
            'Mufflers',
            'Boots', 
            'Coats',
            'T-Shirts',
            'Pants',
            'Accessories'
        ];

        $sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        $colors = ['Black', 'White', 'Gray', 'Navy', 'Brown', 'Beige', 'Red', 'Blue'];

        return view('admin.products.create', compact('categories', 'sizes', 'colors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'category' => 'required|string',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
            'stock_quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $validated['featured'] = $request->has('featured');

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully!');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = [
            'Jackets',
            'Sweaters', 
            'Mufflers',
            'Boots',
            'Coats',
            'T-Shirts',
            'Pants',
            'Accessories'
        ];

        $sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        $colors = ['Black', 'White', 'Gray', 'Navy', 'Brown', 'Beige', 'Red', 'Blue'];

        return view('admin.products.edit', compact('product', 'categories', 'sizes', 'colors'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'category' => 'required|string',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
            'stock_quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'boolean',
            'active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $validated['featured'] = $request->has('featured');
        $validated['active'] = $request->has('active');

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully!');
    }
}