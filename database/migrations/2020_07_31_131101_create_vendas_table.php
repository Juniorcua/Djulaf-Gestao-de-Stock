<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicamentoId');
            $table->foreign('medicamentoId')
            ->references('id')
            ->on('medicamentos');
            $table->integer('quantidade')->length(10);
            $table->double('preco');
            $table->unsignedBigInteger('clienteId');
            $table->foreign('clienteId')
            ->references('id')
            ->on('clientes');
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
        Schema::dropIfExists('vendas');
    }
}
