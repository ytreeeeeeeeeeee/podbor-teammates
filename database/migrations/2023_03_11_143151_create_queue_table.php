<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('queue', function (Blueprint $table) {
            $table->foreignId('user_id')->unique()->primary()->constrained('users');
            $table->foreignId('game_id')->constrained('games');
            $table->boolean('first_accept')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('queue');
    }
};
