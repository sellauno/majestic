<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('idProject');
            $table->integer('idClient');
            $table->integer('reels')->nullable();
            $table->integer('tiktok')->nullable();
            $table->integer('feeds')->nullable();
            $table->integer('stories')->nullable();
            $table->date('tglMulai');
            $table->date('tglSelesai');
            $table->string('status');
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
        Schema::dropIfExists('projects');
    }
}
