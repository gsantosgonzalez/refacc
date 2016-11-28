<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompraMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->double('total', 15, 2);
            $table->integer('id_proveedor')->unsigned();
            $table->timestamps();

            $table->foreign('id_proveedor')->references('id')->on('proveedor')->onDelete('cascade');
        });

        Schema::create('compra_articulo', function(Blueprint $table){
            $table->primary(['id_compra', 'id_articulo']);
            $table->integer('id_compra')->unsigned();
            $table->integer('id_articulo')->unsigned();
            $table->integer('cantidad');
            $table->double('precio', 15, 2)->nullable();

            $table->foreign('id_compra')->references('id')->on('compra')->onDelete('cascade');
            $table->foreign('id_articulo')->references('id')->on('articulo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compra');
    }
}
