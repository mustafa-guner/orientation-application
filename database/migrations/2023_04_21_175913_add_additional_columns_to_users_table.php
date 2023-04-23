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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean("is_admin")->default(0)->after("user_id");
            $table->string("profile_image")->nullable()->after("user_id");
            $table->timestamp("birth_date")->after("user_id");
            $table->unsignedBigInteger('user_type_id')->after("user_id");
            $table->unsignedBigInteger('city_id')->after("user_id");
            $table->unsignedBigInteger('gender_id')->after("user_id");
            $table->string("phone_no")->unique()->after("user_id");
            $table->string("first_name")->after("user_id");
            $table->string("last_name")->after("user_id");

            $table->foreign("user_type_id")->references("user_type_id")->on("user_type")->onDelete("cascade");
            $table->foreign("city_id")->references("city_id")->on("city");
            $table->foreign("gender_id")->references("gender_id")->on("gender");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('user_type_id');
        });
    }
};
