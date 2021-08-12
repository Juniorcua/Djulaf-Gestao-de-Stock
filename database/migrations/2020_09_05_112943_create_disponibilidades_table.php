<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisponibilidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disponibilidades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farmaciaId');
            $table->foreign('farmaciaId')
            ->references('id')
            ->on('farmacias');
            $table->unsignedBigInteger('medicamentoId');
            $table->foreign('medicamentoId')
            ->references('id')
            ->on('medicamentos');
            $table -> enum('estado',['0','1'] )-> default('0');
            $table->string('criadoPor',20)->nullable();
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
        Schema::dropIfExists('disponibilidades');
    }
}
