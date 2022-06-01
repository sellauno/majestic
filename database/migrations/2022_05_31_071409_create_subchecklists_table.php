<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubchecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subchecklists', function (Blueprint $table) {
            $table->integer('idSubChecklist');
            $table->integer('idChecklist');
            $table->integer('idUser');
            $table->string('subTodo', 100);
            $table->date('tglStart')->nullable();
            $table->date('deadline')->nullable();
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
        Schema::dropIfExists('subchecklists');
    }
}
