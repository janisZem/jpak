<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeClassif extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('classif', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 256);
            $table->string('code', 256);
            $table->string('value', 256);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('classif');
    }

}
