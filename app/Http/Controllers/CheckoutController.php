<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;

class CheckoutController extends Controller
{
    public function show()
    {
        return view('checkout');
    }

    public function process(Request $request)
    {
        \Log::info('Checkout Request Data:', $request->all());
        
        try {
            // Basic check for required fields
            $requiredFields = ['first_name', 'last_name', 'email', 'phone', 'address', 'city', 'country', 'postcode'];
            foreach ($requiredFields as $field) {
                if (empty($request->$field)) {
                    return response()->json([
                        'success' => false,
                        'message' => "Please fill in all required fields. Missing: $field"
                    ], 422);
                }
            }

            // Validate email format
            if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please enter a valid email address'
                ], 422);
            }

            // Get cart items
            $cartItems = json_decode($request->cart_items, true) ?? [];
            
            if (empty($cartItems)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Your cart is empty!'
                ], 400);
            }

            // Calculate total
            $subtotal = 0;
            foreach ($cartItems as $item) {
                $price = floatval(str_replace(['$', ','], '', $item['price']));
                $subtotal += $price * $item['quantity'];
            }

            $shipping = 10.00;
            $tax = $subtotal * 0.1;
            $total = $subtotal + $shipping + $tax;

            // Create order
            $order = Order::create([
                'user_id' => Auth::id() ?? 1,
                'order_number' => 'WNTR-' . time() . '-' . rand(1000, 9999),
                'total_amount' => $total,
                'status' => 'pending',
                'payment_status' => 'pending',
                'payment_method' => $request->payment_method ?? 'credit-card',
                'shipping_address' => "{$request->first_name} {$request->last_name}\n{$request->address}\n{$request->city}, {$request->country} {$request->postcode}",
                'customer_name' => $request->first_name . ' ' . $request->last_name,
                'customer_email' => $request->email,
                'customer_phone' => $request->phone,
                'notes' => $request->notes ?? '',
                // Add additional fields for email
                'subtotal' => $subtotal,
                'shipping' => $shipping,
                'tax' => $tax,
                'billing_first_name' => $request->first_name,
                'billing_last_name' => $request->last_name,
                'billing_address' => $request->address,
                'billing_city' => $request->city,
                'billing_country' => $request->country,
                'billing_postcode' => $request->postcode,
            ]);

            // Create order items
            $orderItemsData = [];
            foreach ($cartItems as $item) {
                $product = Product::firstOrCreate(
                    ['name' => $item['name']],
                    [
                        'name' => $item['name'],
                        'description' => 'Auto-created from order',
                        'price' => floatval(str_replace(['$', ','], '', $item['price'])),
                        'category' => 'General',
                        'stock_quantity' => 100,
                        'active' => true
                    ]
                );

                $orderItem = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'unit_price' => $product->price,
                    'total_price' => $product->price * $item['quantity']
                ]);

                // Store item data for email - Handle image path properly
                $itemImage = $item['image'] ?? null;
                
                // Log the original image path for debugging
                \Log::info("Original image path: " . $itemImage);
                
                if ($itemImage) {
                    // If it's a relative path, ensure it's properly formatted
                    if (strpos($itemImage, 'http') !== 0 && strpos($itemImage, 'https') !== 0) {
                        // Remove any leading slashes and ensure proper path
                        $itemImage = ltrim($itemImage, '/');
                        
                        // Check if the file exists in public directory
                        $publicPath = public_path($itemImage);
                        if (file_exists($publicPath)) {
                            \Log::info("Image file exists: " . $publicPath);
                        } else {
                            \Log::warning("Image file not found: " . $publicPath);
                            // If file doesn't exist, try with img/ prefix
                            if (strpos($itemImage, 'img/') !== 0) {
                                $itemImage = 'img/' . $itemImage;
                                $publicPath = public_path($itemImage);
                                if (file_exists($publicPath)) {
                                    \Log::info("Image file found with img/ prefix: " . $publicPath);
                                } else {
                                    \Log::warning("Image file still not found: " . $publicPath);
                                    $itemImage = null;
                                }
                            }
                        }
                    }
                }

                $orderItemsData[] = [
                    'name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                    'total' => $product->price * $item['quantity'],
                    'image' => $itemImage
                ];
                
                // Log the final image path being stored
                \Log::info("Final image path for email: " . ($itemImage ?? 'No image'));
            }

            // Store order items as JSON for email
            $order->items = json_encode($orderItemsData);
            $order->save();

            // Log order items data for debugging
            \Log::info("Order items data for email:", $orderItemsData);

            // Send email confirmation
            $this->sendOrderConfirmationEmail($order, $orderItemsData);

            return response()->json([
                'success' => true,
                'message' => 'Order placed successfully! Confirmation email sent.',
                'order_number' => $order->order_number,
                'order_id' => $order->id
            ]);

        } catch (\Exception $e) {
            \Log::error('Checkout Error: ' . $e->getMessage());
            \Log::error('Checkout Trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Send order confirmation email
     */
    private function sendOrderConfirmationEmail($order, $orderItems)
    {
        try {
            // Log email sending attempt
            \Log::info("Attempting to send email to: " . $order->customer_email);
            \Log::info("Order items being sent to email:", $orderItems);

            // Send email to customer
            Mail::to($order->customer_email)->send(new OrderConfirmation($order, $orderItems));
            
            \Log::info('Order confirmation email sent to: ' . $order->customer_email);

        } catch (\Exception $e) {
            \Log::error('Email sending failed: ' . $e->getMessage());
            \Log::error('Email error trace: ' . $e->getTraceAsString());
        }
    }

    /**
     * Fallback method to resend order confirmation email
     */
    public function resendConfirmationEmail($orderId)
    {
        try {
            $order = Order::findOrFail($orderId);
            $orderItems = json_decode($order->items, true) ?? [];
            
            $this->sendOrderConfirmationEmail($order, $orderItems);
            
            return response()->json([
                'success' => true,
                'message' => 'Confirmation email resent successfully!'
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Resend email error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to resend email: ' . $e->getMessage()
            ], 500);
        }
    }
}