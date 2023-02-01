<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('NomP');
            $table->string('PrenomP');
            $table->string('Speudo');
            $table->string('AgeP');
            $table->string('Score');
            $table->unsignedBigInteger('EvenementInscrit');
            $table->foreign('EvenementInscrit')->references('id')->on('evenements');
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
        Schema::dropIfExists('participants');
    }
}
