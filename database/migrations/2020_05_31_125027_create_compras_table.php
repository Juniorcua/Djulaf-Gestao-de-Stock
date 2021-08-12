<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->integer('codBarras') ->length(25);
            $table->unsignedBigInteger('medicamentoId');
            $table->foreign('medicamentoId')
            ->references('id')
            ->on('medicamentos');
            $table->unsignedBigInteger('fornecedorId');
            $table->foreign('fornecedorId')
            ->references('id')
            ->on('fornecedors');
            $table->integer('quantidade') ->length(10);
            $table->double('precoCompra');
            $table->double('precoVenda');
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
        Schema::dropIfExists('compras');
    }
}
