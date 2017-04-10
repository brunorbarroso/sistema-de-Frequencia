<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChamadaCriancasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamada_criancas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('crianca_id');
            $table->integer('presenca');
            $table->integer('chamada_id');
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
        Schema::drop('chamada_criancas');
    }
}
