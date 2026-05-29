<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Limpa a tabela antes de popular
        Category::truncate();

        $categories = [
            [
                'name'        => 'Electronics',
                'description' => 'Electronic products and gadgets',
            ],
            [
                'name'        => 'Computers',
                'description' => 'Laptops, desktops and accessories',
            ],
            [
                'name'        => 'Smartphones',
                'description' => 'Mobile phones and accessories',
            ],
            [
                'name'        => 'Home Appliances',
                'description' => 'Kitchen and home appliances',
            ],
            [
                'name'        => 'Books',
                'description' => 'Physical and digital books',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}