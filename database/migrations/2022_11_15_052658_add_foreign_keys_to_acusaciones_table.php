<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAcusacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acusaciones', function (Blueprint $table) {
            $table->foreign(['cedulaAcusado'], 'acusaciones_ibfk_1')->references(['cedula'])->on('acusados')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('acusaciones', function (Blueprint $table) {
            $table->dropForeign('acusaciones_ibfk_1');
        });
    }
}
