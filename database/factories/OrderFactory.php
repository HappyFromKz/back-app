<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\User;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Связываем с пользователем
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
            'total' => $this->faker->randomFloat(2, 20, 200),
        ];
    }
}
