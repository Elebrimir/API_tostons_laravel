<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('encounters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('round');
            $table->bigInteger('match_player1')->unsigned();
            $table->bigInteger('match_player2')->unsigned();
            $table->integer('touchdowns1');
            $table->integer('touchdowns2');
            $table->integer('casualties1');
            $table->integer('casualties2');

            $table->foreign('match_player1')->references('id')->on('users');
            $table->foreign('match_player2')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match');
    }
};
