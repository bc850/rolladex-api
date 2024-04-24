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
        Schema::create('business_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("business_name")->nullable();
            $table->string("contact_first_name")->nullable();
            $table->string("contact_middle_name")->nullable();
            $table->string("contact_last_name")->nullable();
            $table->string("address_1")->nullable();
            $table->string("address_2")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("zip")->nullable();
            $table->string("phone_1")->nullable();
            $table->string("phone_2")->nullable();
            $table->string("fax")->nullable();
            $table->string("email")->nullable();
            $table->string("email_2")->nullable();
            $table->string("website")->nullable();
            $table->string("picture_url")->nullable();
            $table->string("industry")->nullable();
            $table->string("sub_industry")->nullable();
            $table->text("notes")->nullable();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_cards');
    }
};
