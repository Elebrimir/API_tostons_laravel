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
            $table->unsignedBigInteger('round_id')->unique();
            $table->unsignedBigInteger('player1_id')->unique();
            $table->unsignedBigInteger('player2_id')->unique();
            $table->integer('table');
            $table->timestamps();

            $table->foreign('round_id')->references('id')->on('rounds');
            $table->foreign('player1_id')->references('user_id')->on('players');
            $table->foreign('player2_id')->references('user_id')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encounters');
    }
};
