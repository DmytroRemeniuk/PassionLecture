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
        Schema::create('t_ouvrage', function (Blueprint $table) {
            $table->id('ouvrage_id');
            $table->string('titre', 128);
            $table->string('extrait', 255);
            $table->text('resume');
            $table->integer('annee');
            $table->string('image');
            $table->smallInteger('nbPages');
            $table->unsignedBigInteger('utilisateur_fk');
            $table->unsignedBigInteger('categorie_fk');
            $table->unsignedBigInteger('editeur_fk');
            $table->unsignedBigInteger('auteur_fk');


            //Clefs étrangères
            $table->foreign('utilisateur_fk')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('categorie_fk')->references('categorie_id')->on('t_categorie')->onDelete('cascade');
            $table->foreign('editeur_fk')->references('editeur_id')->on('t_editeur')->onDelete('cascade');
            $table->foreign('auteur_fk')->references('auteur_id')->on('t_auteur')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_ouvrage');
    }
};
