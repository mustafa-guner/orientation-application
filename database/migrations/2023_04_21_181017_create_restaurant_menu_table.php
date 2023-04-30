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
        Schema::create('restaurant_menu', function (Blueprint $table) {
            $table->id("menu_id");
            $table->text("menu_image");
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign("restaurant_id")->references("restaurant_id")->on("restaurant")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_menu');
    }
};
