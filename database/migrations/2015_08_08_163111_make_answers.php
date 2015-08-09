<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeAnswers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('answer');
            $table->timestamps();
            $table->unsignedInteger('cid');
            $table->foreign('cid')->references('id')->on('classif')->onDelete('cascade'); #answered = y/n
            $table->unsignedInteger('qid');
            $table->foreign('qid')->references('id')->on('questions')->onDelete('cascade');
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
        Schema::drop('answers');
    }

}
