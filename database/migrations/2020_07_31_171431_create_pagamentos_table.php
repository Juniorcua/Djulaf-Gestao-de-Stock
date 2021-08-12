<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendaId');
            $table->foreign('vendaId')
            ->references('id')
            ->on('vendas');
            $table->unsignedBigInteger('tipoPagamentoId');
            $table->foreign('tipoPagamentoId')
            ->references('id')
            ->on('tipo_pagamentos');
            $table->double('valorRecebido');
            $table->double('trocos');
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
        Schema::dropIfExists('pagamentos');
    }
}
