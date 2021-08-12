<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',20);
            $table->unsignedBigInteger('categoriaId');
            $table-> foreign('categoriaId')
            ->references ('id')
            ->on('categorias');
            $table->string('foto',100);
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
        Schema::dropIfExists('medicamentos');
    }
}
