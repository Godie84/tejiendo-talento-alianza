<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('identificacion')->unique();
            $table->string('direccion');
            $table->string('telefono');
            $table->string('ciudad_nacimiento');
            $table->boolean('es_jefe')->default(false); // Para indicar si es jefe o no
            $table->foreignId('jefe_id')->nullable()->constrained('empleados'); // Relación jerárquica
            $table->softDeletes(); // Borrado lógico
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
        Schema::dropIfExists('empleados');
    }
}
