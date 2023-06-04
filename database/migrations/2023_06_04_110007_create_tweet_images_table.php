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
        Schema::create('tweet_images', function (Blueprint $table) {
            $table->foreignId('tweet_id')->constrained('tweets') // constrainedによって外部キー制約を付与
                ->cascadeOnDelete(); // cascadeOnDeleteによってリレーション先が削除されたらこのテーブルからも削除されるようにする
            $table->foreignId('image_id')->constrained('images')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tweet_images');
    }
};
