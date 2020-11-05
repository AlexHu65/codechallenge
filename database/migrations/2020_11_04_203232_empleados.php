<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('empleados', function(Blueprint $table){
        $table->id();
        $table->string('codigo' , 40)->nullable(false);
        $table->string('nombre', 120)->nullable(false);
        $table->double('salarioDolares', 8,2)->nullable(true);
        $table->double('salarioPesos', 8,2)->nullable(true);
        $table->string('direccion', 250)->nullable(false);
        $table->string('estado', 50)->nullable(false);
        $table->string('ciudad', 50)->nullable(false);
        $table->string('telefono', 10)->nullable(false);
        $table->string('correo', 100)->nullable(false);
        $table->tinyInteger('activo')->default(0)->nullable(true);
        $table->softDeletes('deleted_at', 0);
        $table->timestamps(0);

       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
