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
        Schema::create('joueurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_prenom');
            $table->integer('age');
            $table->string('poste');
            $table->integer('nombre_but');
            $table->integer('carte_jaune');
            $table->integer('carte_rouge');
            $table->foreignId('equipe_id')
              ->constrained('equipes')
              ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joueurs');
    }
};
