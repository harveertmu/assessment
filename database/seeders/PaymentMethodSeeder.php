<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentProviders = [
            [
                'name' => 'Stripe',
                'type' => 'Traditional',
                'website' => 'https://www.stripe.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pay.com',
                'type' => 'Traditional',
                'website' => 'https://www.pay.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Apcopay',
                'type' => 'Traditional',
                'website' => 'https://www.apcopay.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'HiPay',
                'type' => 'Traditional',
                'website' => 'https://www.hipay.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'BPPay',
                'type' => 'Traditional',
                'website' => 'https://www.bppay.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Crypto Pay',
                'type' => 'Crypto',
                'website' => 'https://www.cryptopay.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insert the payment providers into the 'payment_providers' table
        DB::table('payment_methods')->insert($paymentProviders);

        // Insert payment methods into the database
    }
}
