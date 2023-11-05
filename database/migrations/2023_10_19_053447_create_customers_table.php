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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_cnic');
            $table->string('customer_address');
            $table->string('customer_placeofwork');
            $table->string('guarantor_name');
            $table->string('guarantor_phone');
            $table->string('guarantor_cnic');
            $table->string('guarantor_address');
            $table->string('guarantor_placeofwork');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
