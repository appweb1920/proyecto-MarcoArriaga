<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelacionCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacion_categoria', function (Blueprint $table) {
            $table->unsignedBigInteger('id_prod');
            $table->foreign('id_prod')->references('id')->on('productos');
            $table->unsignedBigInteger('id_cat');
            $table->foreign('id_cat')->references('id')->on('categorias');
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
        Schema::drop('relacion_categoria');
    }
}
