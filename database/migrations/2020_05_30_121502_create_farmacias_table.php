<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmaciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmacias', function (Blueprint $table) {
            $table->id();
            $table->String('nome',50);
            $table->integer('contacto')->length(15);
            $table->string('email', 30);
            $table->string('endereco',50);
            $table->string('fotoP',100);
            $table->string('fotoF',100);
            $table->string('adress',200)-> nullable();
            $table->double('latitude')-> nullable();
            $table->double('longitude')-> nullable();

            $table->unsignedBigInteger('provinciaId');
            $table->foreign('provinciaId')
            ->references('id')
            ->on('provincias');

            $table->unsignedBigInteger('distritoId');
            $table->foreign('distritoId')
            ->references('id')
            ->on('distritos');

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
        Schema::dropIfExists('farmacias');
    }
}
