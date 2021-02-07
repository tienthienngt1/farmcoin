<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFarm1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm1s', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('field1')->nullable();
            $table->integer('field2')->nullable();
            $table->integer('field3')->nullable();
            $table->integer('field4')->nullable();
            $table->datetime('field1_time')->nullable();
            $table->datetime('field2_time')->nullable();
            $table->datetime('field3_time')->nullable();
            $table->datetime('field4_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farm1s');
    }
}
