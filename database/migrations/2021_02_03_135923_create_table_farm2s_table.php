<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFarm2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm2s', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('farm5')->nullable();
            $table->integer('farm6')->nullable();
            $table->integer('farm7')->nullable();
            $table->integer('farm8')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farm2s');
    }
}
