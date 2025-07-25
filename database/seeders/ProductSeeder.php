<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'iPhone 15 Pro',
                'description' => 'Latest iPhone with advanced camera system and A17 Pro chip.',
                'price' => 999.99,
                'stock' => 25,
                'category' => 'electronics',
                'status' => 'active',
                'image' => 'https://example.com/iphone15.jpg'
            ],
            [
                'name' => 'MacBook Air M2',
                'description' => 'Lightweight laptop with M2 chip and all-day battery life.',
                'price' => 1199.99,
                'stock' => 15,
                'category' => 'electronics',
                'status' => 'active',
                'image' => 'https://example.com/macbook.jpg'
            ],
            [
                'name' => 'Nike Air Max 270',
                'description' => 'Comfortable running shoes with Air Max cushioning.',
                'price' => 149.99,
                'stock' => 50,
                'category' => 'clothing',
                'status' => 'active',
                'image' => 'https://example.com/nike.jpg'
            ],
            [
                'name' => 'The Psychology of Money',
                'description' => 'Bestselling book about financial wisdom and behavioral psychology.',
                'price' => 24.99,
                'stock' => 100,
                'category' => 'books',
                'status' => 'active',
                'image' => 'https://example.com/book.jpg'
            ],
            [
                'name' => 'Yoga Mat Premium',
                'description' => 'High-quality yoga mat with excellent grip and cushioning.',
                'price' => 79.99,
                'stock' => 30,
                'category' => 'sports',
                'status' => 'active',
                'image' => 'https://example.com/yoga-mat.jpg'
            ],
            [
                'name' => 'Coffee Maker Deluxe',
                'description' => 'Programmable coffee maker with built-in grinder.',
                'price' => 199.99,
                'stock' => 8,
                'category' => 'home',
                'status' => 'active',
                'image' => 'https://example.com/coffee-maker.jpg'
            ],
            [
                'name' => 'Wireless Headphones',
                'description' => 'Noise-cancelling wireless headphones with 30-hour battery.',
                'price' => 299.99,
                'stock' => 0,
                'category' => 'electronics',
                'status' => 'inactive',
                'image' => 'https://example.com/headphones.jpg'
            ],
            [
                'name' => 'Gaming Chair Pro',
                'description' => 'Ergonomic gaming chair with lumbar support and RGB lighting.',
                'price' => 399.99,
                'stock' => 12,
                'category' => 'home',
                'status' => 'active',
                'image' => 'https://example.com/gaming-chair.jpg'
            ],
            [
                'name' => 'Smart Watch Series 9',
                'description' => 'Advanced smartwatch with health monitoring and GPS.',
                'price' => 449.99,
                'stock' => 20,
                'category' => 'electronics',
                'status' => 'active',
                'image' => 'https://example.com/smartwatch.jpg'
            ],
            [
                'name' => 'LEGO Architecture Set',
                'description' => 'Build famous landmarks with this detailed LEGO set.',
                'price' => 89.99,
                'stock' => 35,
                'category' => 'toys',
                'status' => 'active',
                'image' => 'https://example.com/lego.jpg'
            ],
            [
                'name' => 'Bluetooth Speaker',
                'description' => 'Portable Bluetooth speaker with waterproof design.',
                'price' => 79.99,
                'stock' => 45,
                'category' => 'electronics',
                'status' => 'active',
                'image' => 'https://example.com/speaker.jpg'
            ],
            [
                'name' => 'Winter Jacket',
                'description' => 'Warm winter jacket with down insulation.',
                'price' => 159.99,
                'stock' => 5,
                'category' => 'clothing',
                'status' => 'draft',
                'image' => 'https://example.com/jacket.jpg'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}