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
        Schema::create('restaurant', function (Blueprint $table) {
            $table->id("restaurant_id");
            $table->string("name");
            $table->string("description");
            $table->string("profile_image");
            $table->string("email")->nullable();
            $table->string("address");
            $table->string("phone_no");
            $table->string("phone_no_2")->nullable();
            $table->boolean("has_outdoor");
            $table->boolean("has_indoor");
            $table->boolean("is_available")->default(1);
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('owner_id');
            $table->string("is_open")->default(1);

            //Social Links
            $table->string("facebook_link")->nullable();
            $table->string("instagram_link")->nullable();
            $table->string("website_link")->nullable();

            $table->foreign("city_id")->references("city_id")->on("city");
            $table->foreign("owner_id")->references("user_id")->on("users")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant');
    }
};
