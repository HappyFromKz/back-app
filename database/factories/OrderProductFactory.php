<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\Product;

class OrderProductFactory extends Factory
{
    protected $model = OrderProduct::class;

    public function definition()
    {
        return [
            'order_id' => Order::factory(), // Связываем с заказом
            'product_id' => Product::factory(), // Связываем с продуктом
            'quantity' => $this->faker->numberBetween(1, 5),
        ];
    }
}
