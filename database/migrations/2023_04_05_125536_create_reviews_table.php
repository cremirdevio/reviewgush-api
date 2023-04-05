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
            $table->string('name')->comment('Name of the reviewer'); // required
            $table->string('email')->comment('Email Address of the reviewer'); // required
            $table->unsignedFloat('rating')->comment('Rating for the review'); // required
            $table->text('message')->comment('Contain the text for the review'); // required

            // Extras
            $table->string('title_or_company')->comment('Company of the reviewer or Position');
            $table->foreignId('review_collection_id')
                ->nullable()
                ->comment('Foreign key to collections table')
                ->constrained('review_collections')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('type')->comment('ReviewGush Inbox, External Integrations');
            $table->boolean('reuse_consent')->default(true)->comment('Permission to use this testimonial across social channels and other marketing efforts');
            $table->string('status')->comment('Active or Archived');

            // Text Review
            $table->string('avatar')->nullable()->comment('The reviewers avatar');
            $table->string('image')->nullable()->comment('Image url for the review');
            $table->string('images')->nullable()->comment('List of other images for the review');

            // Video Review
            $table->string('video')->comment('Video url for the review');
            $table->string('video_thumbnail')->nullable()->comment('Video thumbnail');
            $table->text('excerpt')->comment('One sentence highlight to be displayed along with the video');

            // Social Media Integrations
            $table->string('integration_url')->nullable()->comment('Url of the post or comment from twitter, facebook, linkedin');
            $table->string('integrations_type')->comment('e.g Twitter, Facebook, IG, Tiktok Google, Yelp, Facebook, etc');
            $table->string('integrations_subtype')->nullable()->comment('Is it a comment, main post, twitter collection etc'); // not sure of this yet
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
