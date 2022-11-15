<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcusacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acusaciones', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('cedulaAcusado', 15)->index('cedulaAcusado');
            $table->longText('Descripcion');
            $table->boolean('Culpable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acusaciones');
    }
}
