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
        Schema::create('apprecier', function (Blueprint $table) {

            $table->unsignedBigInteger('utilisateur_fk');
            $table->unsignedBigInteger('ouvrage_fk');


            $table->foreign('utilisateur_fk')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ouvrage_fk')->references('ouvrage_id')->on('t_ouvrage')->onDelete('cascade');

            $table->tinyInteger('note');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apprecier');
    }
};
