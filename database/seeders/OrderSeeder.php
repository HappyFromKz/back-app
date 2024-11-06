<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $users = User::all(); // Получаем всех пользователей

        foreach ($users as $user) {
            Order::factory()->count(2)->create(['user_id' => $user->id]); // Создаем 2 заказа для каждого пользователя
        }
    }
}
