<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Получаем все категории
        $categories = Category::all();

        // Проверяем, есть ли категории, чтобы избежать ошибок
        if ($categories->isNotEmpty()) {
            foreach ($categories as $category) {
                // Создаем 3 продукта для каждой категории
                for ($i = 0; $i < 3; $i++) {
                    Product::create([
                        'name' => 'Product ' . ($i + 1) . ' in ' . $category->name,
                        'description' => 'Description for product ' . ($i + 1),
                        'price' => rand(1000, 9999) / 100, // Случайная цена от 10.00 до 99.99
                        'category_id' => $category->id,
                        'image' => 'https://picsum.photos/200/300?random=' . rand(1, 1000), // Случайное изображение
                    ]);
                }
            }
        }
    }
}


