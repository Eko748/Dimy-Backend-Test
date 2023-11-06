<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = ['BRI', 'BCA', 'BNI', 'Dana', 'ShopeePay', 'Gopay'];
        $price = [1, 1, 1, 1, 1, 2];
        foreach ($items as $key => $item) {
            PaymentMethod::create([
                'name' => $item,
                'is_active' => $price[$key],
            ]);
        }
    }
}
