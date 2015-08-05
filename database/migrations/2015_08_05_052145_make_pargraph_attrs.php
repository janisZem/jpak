<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakePargraphAttrs extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('paragraph_attrs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 256);
            $table->string('value', 256);
            $table->unsignedInteger('par_id');
            $table->foreign('par_id')->references('id')->on('paragraph');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('paragraph');
    }

}
