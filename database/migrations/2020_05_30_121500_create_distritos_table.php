<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distritos', function (Blueprint $table) {
            $table->id();
            $table-> string('nome',30);
            $table-> unsignedBigInteger('provinciaId');
            $table->foreign('provinciaId')
            ->references('id')
            ->on('provincias');
            $table -> enum('estado',['0','1'] )-> default('0');
            $table->string('criadoPor',20)-> nullable();
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
        Schema::dropIfExists('distritos');
    }
}
