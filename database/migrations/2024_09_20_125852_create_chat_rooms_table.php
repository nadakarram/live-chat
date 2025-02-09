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
        Schema::create('chat_rooms', callback: function (Blueprint $table) {
            $table->id();
            $table->string("description");
            $table->string("name");
            $table->unsignedBigInteger("user_created_id");
            $table->string("image")->nullable();
            $table->string("room_type");
            $table->foreign('user_created_id')->references('id')->on('users')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_rooms');
    }
};
