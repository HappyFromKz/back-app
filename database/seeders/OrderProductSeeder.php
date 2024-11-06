<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderProduct;

class OrderProductSeeder extends Seeder
{
    public function run()
    {
        OrderProduct::create([
            'order_id' => 1,
            'product_id' => 6,
            'quantity' => 2,
        ]);

        OrderProduct::create([
            'order_id' => 1,
            'product_id' => 12,
            'quantity' => 1,
        ]);

        OrderProduct::create([
            'order_id' => 1,
            'product_id' => 11,
            'quantity' => 3,
        ]);
    }
}

