<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubtodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtodos', function (Blueprint $table) {
            $table->bigIncrements('idsubtodo');
            $table->integer('idChecklist');
            $table->integer('idUser');
            $table->string('subtodo', 100);
            $table->dateTime('start');
            $table->dateTime('deadline');
            $table->boolean('checked');
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
        Schema::dropIfExists('subtodos');
    }
}
