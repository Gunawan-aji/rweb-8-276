<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name'        => 'Laptop ASUS VivoBook',
                'description' => 'Laptop ringan dengan prosesor Intel Core i5, RAM 8GB, SSD 512GB',
                'price'       => 7500000,
            ],
            [
                'name'        => 'Mouse Wireless Logitech',
                'description' => 'Mouse nirkabel ergonomis dengan baterai tahan lama',
                'price'       => 250000,
            ],
            [
                'name'        => 'Keyboard Mechanical Rexus',
                'description' => 'Keyboard mechanical gaming dengan switch blue, backlight RGB',
                'price'       => 450000,
            ],
            [
                'name'        => 'Monitor LG 24 inch',
                'description' => 'Monitor Full HD IPS 24 inch, refresh rate 75Hz',
                'price'       => 2200000,
            ],
            [
                'name'        => 'Headset Gaming HyperX',
                'description' => 'Headset gaming dengan surround sound 7.1 dan mikrofon noise-cancelling',
                'price'       => 850000,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
