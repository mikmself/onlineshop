<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Sepatu Futsal',
            'desc' => 'Sepatu untuk futsal',
            'img' => '/product/sepatufutsal.png',
            'price' => 500000,
            'stock' => 100
        ]);
        Product::create([
            'name' => 'Tas Formal',
            'desc' => 'Tas untuk acara formal',
            'img' => '/product/tasformal.png',
            'price' => 700000,
            'stock' => 100
        ]);
        Product::create([
            'name' => 'Kacamata Hias',
            'desc' => 'Kacamata untuk hiasan',
            'img' => '/product/kacamata.png',
            'price' => 50000,
            'stock' => 100
        ]);
    }
}
