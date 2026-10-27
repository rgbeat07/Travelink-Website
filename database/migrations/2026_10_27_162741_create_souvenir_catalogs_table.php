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
        Schema::create('souvenir_catalogs', function (Blueprint $table) {
            $table->id();

            $table->foreignId("category_id")->constrained("categories")->cascadeOnDelete();
            $table->string("title");
            $table->text("main_photo_url");
            $table->integer("moq")->default(1);
            $table->text("description");
            $table->text("specification");
            $table->string("is_featured")->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('souvenir_catalogs');
    }
};
