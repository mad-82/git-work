<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Premium Winter Jacket',
                'description' => 'Warm and stylish winter jacket with premium insulation.',
                'price' => 129.99,
                'sale_price' => 99.99,
                'category' => 'Jackets',
                'size' => 'M',
                'color' => 'Black',
                'stock_quantity' => 50,
                'featured' => true,
            ],
            [
                'name' => 'Cashmere Sweater',
                'description' => 'Luxurious cashmere sweater for ultimate comfort.',
                'price' => 89.99,
                'sale_price' => null,
                'category' => 'Sweaters',
                'size' => 'L',
                'color' => 'Gray',
                'stock_quantity' => 30,
                'featured' => true,
            ],
            [
                'name' => 'Wool Muffler',
                'description' => 'Soft wool muffler to keep you warm in style.',
                'price' => 29.99,
                'sale_price' => 24.99,
                'category' => 'Mufflers',
                'size' => null,
                'color' => 'Navy',
                'stock_quantity' => 100,
                'featured' => false,
            ],
            [
                'name' => 'Winter Boots',
                'description' => 'Waterproof winter boots with superior grip.',
                'price' => 79.99,
                'sale_price' => 69.99,
                'category' => 'Boots',
                'size' => 'M',
                'color' => 'Brown',
                'stock_quantity' => 25,
                'featured' => true,
            ],
            [
                'name' => 'Classic Coat',
                'description' => 'Elegant classic coat for formal occasions.',
                'price' => 159.99,
                'sale_price' => 139.99,
                'category' => 'Coats',
                'size' => 'L',
                'color' => 'Beige',
                'stock_quantity' => 20,
                'featured' => false,
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}