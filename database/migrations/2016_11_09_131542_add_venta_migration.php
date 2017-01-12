<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVentaMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->double('total', 15, 2);
            $table->string('pago')->default('EF');
            $table->integer('id_cliente')->unsigned();
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('cliente')->onDelete('cascade');
        });

        Schema::create('venta_articulo', function(Blueprint $table){
            $table->primary(['id_venta', 'id_articulo']);
            $table->integer('id_venta')->unsigned();
            $table->integer('id_articulo')->unsigned();
            $table->integer('cantidad');
            $table->double('precio', 15, 2);

            $table->foreign('id_venta')->references('id')->on('venta')->onDelete('cascade');
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
        Schema::dropIfExists('venta');
    }
}
