<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    public function run()
    {
        Cart::create([
            'user_id' => 2,
            'product_id' => 1,
            'total_orders' => 10
        ]);
        Cart::create([
            'user_id' => 2,
            'product_id' => 2,
            'total_orders' => 5
        ]);
        Cart::create([
            'user_id' => 2,
            'product_id' => 3,
            'total_orders' => 10
        ]);
    }
}
