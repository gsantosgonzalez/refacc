<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArticuloMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave')->unique();
            $table->string('nombre');
            $table->string('tamano')->default('UNICO');
            $table->integer('id_categoria')->unsigned();
            $table->integer('cantidad');
            $table->integer('stock');
            $table->double('precio', 15, 2);
            $table->string('marca');
            $table->string('imagen')->nullable();
            $table->string('status')->default('activo');
            $table->timestamps();

            $table->foreign('id_categoria')->references('id')->on('categoria')->onDelete('cascade');
        });

        Schema::create('compatibilidad', function(Blueprint $table){
            $table->primary(['id_articulo', 'id_modelo']);
            $table->integer('id_articulo')->unsigned();
            $table->integer('id_modelo')->unsigned();
            $table->string('detalle')->nullable();

            $table->foreign('id_articulo')->references('id')->on('articulo')->onDelete('cascade');
            $table->foreign('id_modelo')->references('id')->on('modelo')->onDelete('cascade');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pieza');
    }
}
