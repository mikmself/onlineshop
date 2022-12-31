<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::create([
            'user_id' => 3,
            'product_id' => 1,
            'address' => 'Purwokerto',
            'total_orders' => 5,
            'expedition' => 'jnt',
            'proof_of_payment' => '/proof/proof1.jpg',
            'status' => 'acc'
        ]);
    }
}
