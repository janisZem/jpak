<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeQuestionsTags extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('questions_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 256);
            $table->string('value', 256)->nullable();
            $table->string('code', 256);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('questions_tags');
    }

}
