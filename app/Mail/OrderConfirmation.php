<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $orderItems;
    public $orderDate;
    public $logoUrl;

    /**
     * Create a new message instance.
     */
    public function __construct($order, $orderItems)
    {
        $this->order = $order;
        $this->orderItems = $orderItems;
        $this->orderDate = $order->created_at->format('F j, Y');
        
        // Convert images to base64 for email
        $this->convertImagesToBase64();
        
        // Set logo URL as base64
        $this->logoUrl = $this->getBase64Logo();
    }

    /**
     * Convert images to base64 for email
     */
    private function convertImagesToBase64()
    {
        foreach ($this->orderItems as &$item) {
            // Always set image - either real or placeholder
            $item['image'] = $this->getBase64Image($item['image'] ?? null, $item['name'] ?? 'Product');
        }
    }

    /**
     * Convert image to base64 for email - FIXED VERSION
     */
    private function getBase64Image($imagePath, $productName)
    {
        try {
            // If no image path provided, return placeholder
            if (!$imagePath || $imagePath === 'null' || $imagePath === 'undefined') {
                return $this->createPlaceholderImage($productName);
            }

            // If it's already a base64 image, return as is
            if (strpos($imagePath, 'data:image') === 0) {
                return $imagePath;
            }

            // If it's a full URL, try to download it
            if (strpos($imagePath, 'http') === 0) {
                return $this->downloadImageFromUrl($imagePath, $productName);
            }

            // Remove leading slash if present
            $imagePath = ltrim($imagePath, '/');

            // Try multiple possible locations for the image
            $possiblePaths = [
                public_path('storage/products/' . $imagePath),
                public_path('storage/' . $imagePath),
                storage_path('app/public/products/' . $imagePath),
                storage_path('app/public/' . $imagePath),
                public_path('img/products/' . $imagePath),
                public_path('images/products/' . $imagePath),
                public_path('uploads/products/' . $imagePath),
                public_path($imagePath),
            ];

            foreach ($possiblePaths as $fullPath) {
                if (file_exists($fullPath) && is_file($fullPath) && is_readable($fullPath)) {
                    $imageData = file_get_contents($fullPath);
                    $mimeType = $this->getMimeType($fullPath);
                    
                    if ($mimeType && $imageData) {
                        return 'data:' . $mimeType . ';base64,' . base64_encode($imageData);
                    }
                }
            }

            // If image not found in any location, create placeholder
            return $this->createPlaceholderImage($productName);

        } catch (\Exception $e) {
            // If any error occurs, return placeholder
            \Log::error('Image conversion error: ' . $e->getMessage());
            return $this->createPlaceholderImage($productName);
        }
    }

    /**
     * Download image from URL and convert to base64
     */
    private function downloadImageFromUrl($imageUrl, $productName)
    {
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->get($imageUrl, [
                'timeout' => 10,
                'verify' => false
            ]);
            
            if ($response->getStatusCode() === 200) {
                $imageData = $response->getBody()->getContents();
                $mimeType = $response->getHeaderLine('content-type');
                
                if ($mimeType && strpos($mimeType, 'image/') === 0) {
                    return 'data:' . $mimeType . ';base64,' . base64_encode($imageData);
                }
            }
        } catch (\Exception $e) {
            \Log::error('URL image download failed: ' . $e->getMessage());
        }
        
        return $this->createPlaceholderImage($productName);
    }

    /**
     * Get MIME type of file
     */
    private function getMimeType($filePath)
    {
        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        
        $mimeTypes = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
            'svg' => 'image/svg+xml',
        ];
        
        return $mimeTypes[$extension] ?? 'image/jpeg';
    }

    /**
     * Create a simple SVG placeholder image
     */
    private function createPlaceholderImage($productName)
    {
        $colors = ['#e53637', '#2ecb70', '#007bff', '#6f42c1', '#fd7e14'];
        $color = $colors[array_rand($colors)];
        
        // Take first 2 letters of product name for placeholder
        $initials = strtoupper(substr(trim($productName), 0, 2));
        if (empty($initials)) {
            $initials = 'PR';
        }
        
        $svg = '<?xml version="1.0" encoding="UTF-8"?>
                <svg width="80" height="80" xmlns="http://www.w3.org/2000/svg">
                <rect width="80" height="80" fill="'.$color.'" opacity="0.2"/>
                <rect width="80" height="80" fill="none" stroke="'.$color.'" stroke-width="1"/>
                <text x="40" y="45" font-family="Arial, sans-serif" font-size="14" font-weight="bold" 
                      fill="'.$color.'" text-anchor="middle" dominant-baseline="middle">'.$initials.'</text>
                </svg>';
        
        return 'data:image/svg+xml;base64,' . base64_encode($svg);
    }

    /**
     * Get base64 encoded logo
     */
    private function getBase64Logo()
    {
        $possibleLogoPaths = [
            public_path('img/logo.png'),
            public_path('img/logo.jpg'),
            public_path('images/logo.png'),
            public_path('storage/logo.png'),
            public_path('assets/img/logo.png'),
            storage_path('app/public/logo.png'),
        ];

        foreach ($possibleLogoPaths as $logoPath) {
            if (file_exists($logoPath) && is_readable($logoPath)) {
                $logoData = file_get_contents($logoPath);
                $mimeType = $this->getMimeType($logoPath);
                
                if ($logoData && $mimeType) {
                    return 'data:' . $mimeType . ';base64,' . base64_encode($logoData);
                }
            }
        }

        // Create a simple text-based logo
        $svgLogo = '<?xml version="1.0" encoding="UTF-8"?>
                   <svg width="180" height="50" xmlns="http://www.w3.org/2000/svg">
                   <rect width="180" height="50" fill="#e53637"/>
                   <text x="90" y="28" font-family="Arial, sans-serif" font-size="14" font-weight="bold" 
                         fill="#ffffff" text-anchor="middle" dominant-baseline="middle">
                         WINTERFALL</text>
                   </svg>';
        
        return 'data:image/svg+xml;base64,' . base64_encode($svgLogo);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Confirmation - #' . $this->order->order_number . ' - WinterFall Fashion',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order-confirmation',
            with: [
                'order' => $this->order,
                'orderItems' => $this->orderItems,
                'orderDate' => $this->orderDate,
                'logoUrl' => $this->logoUrl,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}