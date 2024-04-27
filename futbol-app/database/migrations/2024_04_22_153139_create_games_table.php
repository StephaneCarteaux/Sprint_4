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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('league_id')
                ->constrained(
                    table: 'leagues',
                    indexName: 'fk_league_games_id'
                )
                ->onDelete('cascade');
            $table->foreignId('team1_id')
                ->constrained(
                    table: 'teams',
                    indexName: 'fk_team1_id'
                );
            $table->foreignId('team2_id')
                ->constrained(
                    table: 'teams',
                    indexName: 'fk_team2_id'
                );
            $table->unsignedInteger('game_number');
            $table->dateTime('date');
            $table->unsignedInteger('score1');
            $table->unsignedInteger('score2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
