<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the payment methods
        $paymentMethods = [
            ['name' => 'Stripe'],
            ['name' => 'Pay.com'],
            ['name' => 'Apcopay'],
            ['name' => 'HiPay'],
            ['name' => 'BPPay'],
            ['name' => 'Crypto Pay'],
        ];

        // Insert payment methods into the database
    }
}
