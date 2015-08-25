<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeQuestionsTagsRel extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('questions_tags_rel', function (Blueprint $table) {
            $table->unsignedInteger('qid');
            $table->foreign('qid')->references('id')->on('questions')->onDelete('cascade');
            $table->unsignedInteger('tid');
            $table->foreign('tid')->references('id')->on('questions_tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('questions_tags_rel');
    }

}
