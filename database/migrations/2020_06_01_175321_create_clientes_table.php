<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('name',20);
            $table->integer('contacto')->length(15)->nullable();
            $table->string('email', 30)->nullable();
            $table->string('BI', 24)->nullable();
            $table->integer('nuit') ->length(10) -> nullable();
            $table->string('endereco', 20);
            $table->unsignedBigInteger('provinciaId');
            $table-> foreign('provinciaId')
            ->references ('id')
            ->on('provincias');
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
        Schema::dropIfExists('clientes');
    }
}
