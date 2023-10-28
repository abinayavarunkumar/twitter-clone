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
        Schema::create('hashtag_tweet', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('hashtag_id');
        $table->unsignedBigInteger('tweet_id');
        $table->timestamps();

        $table->unique(['hashtag_id', 'tweet_id']);

        // You can add foreign key constraints here if necessary.
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hashtag_tweet');
    }
};
