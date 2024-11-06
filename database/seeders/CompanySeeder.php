<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the companies data
        $companies = [
            [
                'name' => 'Company Malta',
                'bank_account' => 'MT12345678901234567890',  // Example bank account
                'vat_rate' => 18.00,  // Example VAT rate
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Company Cyprus',
                'bank_account' => 'CY12345678901234567890',
                'vat_rate' => 19.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Company Brazil',
                'bank_account' => 'BR12345678901234567890',
                'vat_rate' => 17.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Company Dubai',
                'bank_account' => 'AE12345678901234567890',
                'vat_rate' => 5.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insert the company records into the 'companies' table
        DB::table('companies')->insert($companies);

    
    }
}
