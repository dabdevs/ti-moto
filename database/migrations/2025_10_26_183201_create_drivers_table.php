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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();

            // Relationship to users table
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            // Driver-specific info
            $table->string('phone_number')->nullable();
            $table->string('license_number')->nullable();
            $table->string('vehicle_type')->nullable(); // e.g. motorcycle, scooter
            $table->string('vehicle_model')->nullable();
            $table->string('vehicle_plate_number')->nullable();
            $table->string('vehicle_color')->nullable();
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->integer('total_rides')->default(0);
            $table->boolean('available')->default(true);
            $table->boolean('verified')->default(false);
            $table->decimal('wallet_balance', 10, 2)->default(0.00);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
