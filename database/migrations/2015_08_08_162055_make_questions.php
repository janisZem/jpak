<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeQuestions extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 256);
            $table->text('question');
            $table->timestamps();
            $table->char('status', 4);
            $table->unsignedInteger('cid');
            $table->foreign('cid')->references('id')->on('classif')->onDelete('cascade'); //state Iesniegts/Apstiprināts
            $table->string('name', 256)->nullable();
            $table->string('surname', 256)->nullable();
            $table->string('email', 256)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('questions');
    }

}
