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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('title');
            $table->string('yt_vid_id');
            $table->text('thumbnail_url');
            $table->string('location');
            $table->integer('pax');
            $table->string('duration');
            $table->text('summary');
            $table->boolean('is_featured')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
