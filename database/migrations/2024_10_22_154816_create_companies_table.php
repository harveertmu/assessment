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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->enum('name', [
                'Company Malta',
                'Company Cyprus',
                'Company Brazil',
                'Company Dubai'
            ]);
            $table->string('bank_account')->nullable(); // Assuming this could be a string to hold account details
            $table->decimal('vat_rate', 5, 2); // Assuming VAT rate can have two decimal places
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
