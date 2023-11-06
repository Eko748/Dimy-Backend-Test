<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerAddress;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = ['Boy William', 'John Doe', 'Ayaka', 'Billy', 'Ujang', 'Maulidia'];
        $addresses = ['Bandung', 'Cirebon', 'Majalengka', 'Sumatera Utara', 'Sumedang', 'Indramayu'];

        foreach ($customers as $key => $customerName) {
            $customer = Customer::create([
                'customer_name' => $customerName,
            ]);

            CustomerAddress::create([
                'customer_id' => $customer->id,
                'address' => $addresses[$key],
            ]);
        }
    }
}
