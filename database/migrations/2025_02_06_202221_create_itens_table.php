<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->timestamps();
            $table->string('nome');
            $table->string('categoria');
            $table->float('preco_bruto');
            $table->float('preco_liquido')->nullable();
            $table->integer('desconto')->nullable();
            $table->integer('quantidade');
            $table ->string('img_itens')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens');
    }
}