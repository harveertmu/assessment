<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->enum('name', [
                'Stripe', 
                'Pay.com', 
                'Apcopay', 
                'HiPay', 
                'BPPay', 
                'Crypto Pay'
            ]);
            $table->enum('type', ['Traditional', 'Crypto']); // Assuming type is also needed
            $table->string('website')->nullable(); // Adding a website field, as it was part of the requirements
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
