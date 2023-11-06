<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = ['Laptop Asus', 'MacBook Pro', 'Hp Vivo Y50', 'Hp Xiaomi Black Shark', 'Case Vivo Y50'];
        $prices = [7000.00, 24000.00, 3200.00, 12000.00, 2000.00];

        foreach ($items as $key => $item) {
            Product::create([
                'name' => $item,
                'price' => $prices[$key],
            ]);
        }
    }
}
