<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::truncate();

        $products = [
            [
                'category_id' => 1,
                'name'        => 'Smart TV 55"',
                'description' => 'Smart TV 4K com HDR e Wi-Fi integrado',
                'price'       => 2499.99,
                'stock'       => 15,
                'active'      => true,
            ],
            [
                'category_id' => 2,
                'name'        => 'Notebook Gamer',
                'description' => 'Notebook com RTX 4060, 16GB RAM e SSD 512GB',
                'price'       => 5999.99,
                'stock'       => 8,
                'active'      => true,
            ],
            [
                'category_id' => 3,
                'name'        => 'iPhone 15',
                'description' => 'Apple iPhone 15 128GB',
                'price'       => 4999.99,
                'stock'       => 20,
                'active'      => true,
            ],
            [
                'category_id' => 4,
                'name'        => 'Micro-ondas 32L',
                'description' => 'Micro-ondas com painel digital e 10 níveis de potência',
                'price'       => 599.99,
                'stock'       => 30,
                'active'      => true,
            ],
            [
                'category_id' => 5,
                'name'        => 'Clean Code',
                'description' => 'Livro Clean Code — Robert C. Martin',
                'price'       => 89.99,
                'stock'       => 50,
                'active'      => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}