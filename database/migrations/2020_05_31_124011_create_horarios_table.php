<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->time('abertura');
            $table->time('enceramento');
            $table->unsignedBigInteger('farmaciaId');
            $table->foreign('farmaciaId')
            ->references('id')
            ->on('farmacias');
            $table -> enum('estado',['0','1'] )-> default('0');
            $table->string('criadoPor',15)->nullable();
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
        Schema::dropIfExists('horarios');
    }
}
