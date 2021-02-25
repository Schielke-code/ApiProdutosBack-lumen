<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{

    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('produto_kit_id')->nullable();
            $table->foreign('produto_kit_id')->references('id')->on('produtos');
            $table->string('categoria');
            $table->string('nome')->nullable();
            $table->text('descricao')->nullable();
            $table->float('preco')->nullable();
            $table->text('image')->nullable();
            $table->enum('tipo',['PRODUTO', 'KIT'])->default('PRODUTO');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
