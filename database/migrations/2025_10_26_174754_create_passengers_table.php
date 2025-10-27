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
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            // Passenger-specific info
            $table->string('phone_number')->nullable();
            $table->string('default_payment_method')->default('cash'); // e.g. cash, card, wallet
            $table->string('preferred_language')->default('en'); // en, ht, fr
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->integer('total_rides')->default(0);
            $table->decimal('wallet_balance', 10, 2)->default(0.00);
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('profile_picture')->nullable();
            $table->boolean('verified')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passengers');
    }
};
