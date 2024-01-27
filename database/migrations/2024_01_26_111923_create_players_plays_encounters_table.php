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
        Schema::create('players_plays_encounters', function (Blueprint $table) {
            $table->unsignedBigInteger('player_id')->unique();
            $table->unsignedBigInteger('encounter_id')->unique();
            $table->integer('td_player1');
            $table->integer('td_player2');
            $table->integer('cas_player1');
            $table->integer('cas_player2');
            $table->integer('triple_skull');

            $table->primary(['player_id', 'encounter_id']);

            $table->foreign('player_id')->references('user_id')->on('players');
            $table->foreign('encounter_id')->references('id')->on('encounters');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players_plays_encounters');
    }
};
