<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('description');
            $table->string('avatar');
            $table->string('steam_link')->nullable()->unique();
            $table->string('discord_link')->nullable()->unique();
            $table->string('country');
            $table->foreignId('role_id')->default(1)->constrained('roles');
            $table->foreignId('status_id')->default(1)->constrained('statuses');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
