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
        Schema::create('review_collections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            // Review collection form for this Collection
            // header title, custom message, questions, extra information to collect (Title, company, Social link, Address)
            // collect users consent (yes/no)
            // collect star ratings (yes/no)
            // theme(light/dark), button color, language, auto translate
            // video message


            // Extra Settings
            // max video duration
            // max char for review message
            // video button text (Record a Video)
            // text button text (Send as Text)
            // consent statement (I give permission to use this testimonial.)
            // question label (Questions)
            // watermark on video(yes/no)
            // default review avatar
            // affiliate link ( for reviewgush)
            // show reviews from wall of love
            // auto add to wall of love
            // disable video recording for iphone users

            // Thank You Page
            // show gif image (true/false)
            // image_url
            // title (Thank You)
            // message (Thank you so much for your shoutout! It means a ton for us! 🙏)
            // allow users share thank you page on social media (yes/no)
            // page_redirect_url (Redirect to your own page)
            // automatically reward users for video testimonials

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_collections');
    }
};
