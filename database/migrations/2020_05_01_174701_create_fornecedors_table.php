<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedors', function (Blueprint $table) {
            $table->id();
            $table->string('nome',20);
            $table->integer('contacto')
            ->length(15);
            $table->string('email',20);
            $table->string('endereco',40);
            $table -> enum('estado',['0','1'] )-> default('0');
            $table->string('descricao', 25);
            $table->String('criadoPor')->nullable();
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
        Schema::dropIfExists('fornecedors');
    }
}
