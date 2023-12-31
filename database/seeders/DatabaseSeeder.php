<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\OrderDetail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                UserSeeder::class,
                CustomerSeeder::class,
                ProductSeeder::class,
                PaymentMethodSeeder::class,
                OrderSeeder::class,
                OrderDetailSeeder::class,
            ]
        );
    }
}
