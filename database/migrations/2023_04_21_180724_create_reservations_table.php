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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id("reservation_id");

            $table->timestamp("reservation_date");
            $table->tinyInteger("users_no");
            $table->string("comment")->nullable();
            $table->boolean("in_door")->default(0);
            $table->boolean("out_door")->default(0);

            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('reserved_by');

            $table->foreign("status_id")->references("status_id")->on("status");
            $table->foreign("restaurant_id")->references("restaurant_id")->on("restaurant")->onDelete("cascade");
            $table->foreign("reserved_by")->references("user_id")->on("users")->onDelete("cascade");

            $table->timestamp("updated_at");
            $table->timestamp("created_at")->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
