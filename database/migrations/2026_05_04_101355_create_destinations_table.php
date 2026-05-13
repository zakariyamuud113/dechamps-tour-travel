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
    Schema::create('destinations', function (Blueprint $table) {
        $table->id();

        // Basic Info
        $table->string('name');
        $table->string('category')->nullable();
        $table->string('slug')->unique();
        $table->text('description');
        $table->string('image')->nullable();
        

        // Location Details
        $table->string('location')->nullable();
        $table->string('elevation')->nullable();
        $table->string('best_time')->nullable();
        $table->string('wildlife')->nullable();

        // Package Info
        $table->decimal('price', 10, 2)->nullable();
        $table->string('duration')->nullable();
        $table->string('group_size')->nullable();
        $table->string('best_season')->nullable();
        $table->string('difficulty')->nullable();

        // Flexible Data
        $table->text('highlights')->nullable();

        // UI Control
        $table->boolean('featured')->default(false);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
        
    }
};
