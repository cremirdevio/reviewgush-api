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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text()->comment('Contain the text for the review');
            $table->unsignedFloat('rating')->comment('Rating for the review');
            $table->foreignId('review_collection_id')
                ->nullable()
                ->comment('Foreign key to collections table')
                ->constrained('review_collections')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('platform')->comment('e.g Native(reviewgush), Google, Yelp, Facebook, etc');
            $table->string('video')->comment('Video url for the review');
            $table->string('image')->comment('Image url for the review');
            $table->string('images')->nullable()->comment('List of other images for the review');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
