<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'telp' => '081229473829',
            'level' => 'admin',
            'password' => Hash::make('admin123')
        ]);

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'telp' => $faker->phoneNumber(),
                'level' => 'user',
                'password' => Hash::make('user123')
            ]);
        }
    }
}
