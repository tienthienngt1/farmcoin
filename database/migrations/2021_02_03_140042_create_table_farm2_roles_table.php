<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFarm2RolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm2_roles', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('farm5_role');
            $table->integer('farm6_role');
            $table->integer('farm7_role');
            $table->integer('farm8_role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farm2_roles');
    }
}
