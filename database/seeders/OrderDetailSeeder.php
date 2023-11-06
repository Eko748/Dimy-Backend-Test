<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = range(1, 5);
        $paymentMethods = range(1, 5);

        foreach ($products as $key => $product) {
            OrderDetail::create([
                'order_id' => 1,
                'product_id' => $product,
                'payment_method_id' => $paymentMethods[$key],
            ]);
        }
        OrderDetail::create([
            'order_id' => 2,
            'product_id' => 2,
            'payment_method_id' => 5,
        ]);
    }
}
