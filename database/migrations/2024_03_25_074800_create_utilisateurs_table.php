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
        Schema::create('t_utilisateur', function (Blueprint $table) {
            $table->id('utilisateur_id');
            $table->string('pseudo', 128);
            $table->date('dateEntree');
            $table->boolean('estAdmin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_utilisateur');
    }
};
