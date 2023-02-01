<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('Type');
            $table->string('Titre');
            $table->string('StatuEquipe');
            $table->string('NombreDansLEquipe');
            $table->string('ParticipantMax');
            $table->float('Prix');
            $table->string('Description');
            $table->string('DateDebut');
            $table->string('HeureDebut');
            $table->string('Organisateur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evenements');
    }
}
