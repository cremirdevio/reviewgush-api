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
        Schema::create('review_walls', function (Blueprint $table) {
            $table->id();
            $table->string('style')->comment('The design style for the wall of love');
            $table->string('review_selection')->comment('Can be by tag, all, or selected');
            // other settings to be added
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_walls');
    }
};
