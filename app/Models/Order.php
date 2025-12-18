<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'total_amount',
        'status',
        'payment_status',
        'shipping_address',
        'customer_name',
        'customer_email',
        'customer_phone',
        'notes',
        // New fields for email functionality
        'subtotal',
        'shipping',
        'tax',
        'items',
        'billing_first_name',
        'billing_last_name',
        'billing_address',
        'billing_city',
        'billing_country',
        'billing_postcode'
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'shipping' => 'decimal:2',
        'tax' => 'decimal:2',
        'items' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Status constants
    const STATUS_PENDING = 'pending';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_CANCELLED = 'cancelled';

    const PAYMENT_PENDING = 'pending';
    const PAYMENT_PAID = 'paid';
    const PAYMENT_FAILED = 'failed';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Generate unique order number
    public static function generateOrderNumber()
    {
        $prefix = 'WNTR';
        $timestamp = now()->format('Ymd');
        $random = strtoupper(substr(uniqid(), -6));
        
        return $prefix . '-' . $timestamp . '-' . $random;
    }

    // Get status color for UI
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'pending' => 'yellow',
            'confirmed' => 'blue',
            'shipped' => 'purple',
            'delivered' => 'green',
            'cancelled' => 'red',
            default => 'gray'
        };
    }

    // Get payment status color
    public function getPaymentStatusColorAttribute()
    {
        return match($this->payment_status) {
            'pending' => 'yellow',
            'paid' => 'green',
            'failed' => 'red',
            default => 'gray'
        };
    }

    // Calculate totals if not set
    public function calculateTotals()
    {
        if (!$this->subtotal) {
            $this->subtotal = $this->orderItems->sum('total_price');
        }
        
        if (!$this->shipping) {
            $this->shipping = 10.00; // Default shipping
        }
        
        if (!$this->tax) {
            $this->tax = $this->subtotal * 0.1; // 10% tax
        }
        
        if (!$this->total_amount) {
            $this->total_amount = $this->subtotal + $this->shipping + $this->tax;
        }
        
        return $this;
    }

    // Get formatted address
    public function getFormattedAddressAttribute()
    {
        if ($this->shipping_address) {
            return $this->shipping_address;
        }
        
        return "{$this->billing_first_name} {$this->billing_last_name}\n{$this->billing_address}\n{$this->billing_city}, {$this->billing_country} {$this->billing_postcode}";
    }

    // Get order items for email
    public function getEmailItemsAttribute()
    {
        if ($this->items && is_array($this->items)) {
            return $this->items;
        }
        
        // Fallback to order items relationship
        return $this->orderItems->map(function ($item) {
            return [
                'name' => $item->product->name ?? 'Product',
                'quantity' => $item->quantity,
                'price' => $item->unit_price,
                'total' => $item->total_price,
                'image' => $item->product->image ?? null
            ];
        })->toArray();
    }

    // Check if order can have email sent
    public function canSendEmail()
    {
        return !empty($this->customer_email) && filter_var($this->customer_email, FILTER_VALIDATE_EMAIL);
    }

    // Scope for orders that need confirmation email
    public function scopeNeedsConfirmation($query)
    {
        return $query->where('status', self::STATUS_PENDING)
                    ->where('payment_status', self::PAYMENT_PAID)
                    ->whereNotNull('customer_email');
    }

    // Get order summary for email
    public function getOrderSummaryAttribute()
    {
        return [
            'subtotal' => $this->subtotal,
            'shipping' => $this->shipping,
            'tax' => $this->tax,
            'total' => $this->total_amount,
            'items_count' => $this->orderItems->count(),
            'order_date' => $this->created_at->format('F j, Y')
        ];
    }
}