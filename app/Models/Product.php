<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description', 
        'price',
        'sale_price',
        'category',
        'size',
        'color',
        'stock_quantity',
        'image',
        'featured',
        'active',
        'tags'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'featured' => 'boolean',
        'active' => 'boolean'
    ];

    /**
     * ----------------------------------------------------------
     *  IMAGE URL ACCESSOR (COMPLETELY FIXED FOR YOUR SETUP)
     * ----------------------------------------------------------
     */
    public function getImageUrlAttribute()
    {
        // Case 1: Image exists in public/img/products/ (YOUR ACTUAL UPLOAD LOCATION)
        if ($this->image && file_exists(public_path('img/products/' . $this->image))) {
            return asset('img/products/' . $this->image);
        }

        // Case 2: Image exists in public/img/product/ (FOR BACKWARD COMPATIBILITY)
        if ($this->image && file_exists(public_path('img/product/' . $this->image))) {
            return asset('img/product/' . $this->image);
        }

        // Case 3: Image exists in storage (Laravel default)
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            return asset('storage/' . $this->image);
        }

        // Case 4: Check if image is a full URL (for external images)
        if ($this->image && filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        // Default fallback image
        return asset('img/product/product-1.jpg');
    }

    // Relationship: Order Items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Scope: Active
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    // Scope: Featured
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    // Display price
    public function getDisplayPriceAttribute()
    {
        return $this->sale_price ? $this->sale_price : $this->price;
    }

    // Is on sale?
    public function getIsOnSaleAttribute()
    {
        return $this->sale_price !== null && $this->sale_price < $this->price;
    }

    // Discount %
    public function getDiscountPercentageAttribute()
    {
        if (!$this->is_on_sale) {
            return 0;
        }

        return round((($this->price - $this->sale_price) / $this->price) * 100);
    }

    // Total sold quantity
    public function getTotalSoldAttribute()
    {
        return $this->orderItems()->sum('quantity');
    }

    // Total revenue
    public function getTotalRevenueAttribute()
    {
        return $this->orderItems()->sum('total_price');
    }

    // In stock?
    public function getInStockAttribute()
    {
        return $this->stock_quantity > 0;
    }

    // Stock status
    public function getStockStatusAttribute()
    {
        if ($this->stock_quantity > 10) return 'In Stock';
        if ($this->stock_quantity > 0) return 'Low Stock';
        return 'Out of Stock';
    }

    // Formatted price
    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }

    // Formatted sale price
    public function getFormattedSalePriceAttribute()
    {
        return $this->sale_price ? '$' . number_format($this->sale_price, 2) : null;
    }

    // Category slug
    public function getCategorySlugAttribute()
    {
        return strtolower(str_replace(' ', '-', $this->category));
    }

    // Related products
    public function relatedProducts($limit = 4)
    {
        return self::where('category', $this->category)
            ->where('id', '!=', $this->id)
            ->where('active', true)
            ->limit($limit)
            ->get();
    }
}