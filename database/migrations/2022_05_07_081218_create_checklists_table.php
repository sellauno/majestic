<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->bigIncrements('idChecklist');
            $table->integer('idProject');
            $table->integer('idUser');
            $table->string('toDO');
            $table->date('deadline')->nullable();
            $table->string('linkFile')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @r eturn void
     */
    public function down()
    {
        Schema::dropIfExists('checklists');
    }
}
