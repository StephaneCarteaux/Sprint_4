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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('league_id')
                ->constrained(
                    table: 'leagues',
                    indexName: 'fk_league_teams_id'
                )
                ->onDelete('cascade');
            $table->string('name');
            $table->char('logo', 255);
            $table->timestamps();
            // Restriction UNIQUE for league_id/name
            $table->unique(['league_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
