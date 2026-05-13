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
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();

        // Destination Relationship
        $table->foreignId('destination_id')
              ->constrained()
              ->onDelete('cascade');

        // Trip Details
        $table->date('preferred_date');
        $table->integer('travelers');
        $table->integer('duration');

        // Customer Details
        $table->string('full_name');
        $table->string('email');
        $table->string('phone');
        $table->string('country');

        // Preferences
        $table->string('age_group')->nullable();
        $table->string('accommodation')->nullable();
        $table->text('dietary_requirements')->nullable();
        $table->text('special_requests')->nullable();

        // // Insurance
        // $table->boolean('travel_insurance')->default(false);

        // Payment
        $table->decimal('subtotal', 10, 2)->nullable();
        $table->decimal('total_amount', 10, 2)->nullable();

        // Booking Status
        $table->string('status')->default('pending');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
