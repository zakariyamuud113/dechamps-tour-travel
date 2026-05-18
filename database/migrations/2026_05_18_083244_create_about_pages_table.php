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
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();

            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->string('hero_image')->nullable();

            $table->string('story_title')->nullable();
            $table->longText('story_content')->nullable();
            $table->string('story_image')->nullable();

            $table->longText('mission')->nullable();
            $table->longText('vision')->nullable();

            $table->string('years_experience')->nullable();
            $table->string('happy_travelers')->nullable();
            $table->string('destinations_count')->nullable();
            $table->string('tour_guides')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};
