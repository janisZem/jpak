<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeParagraph extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('paragraph', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 256);
            $table->text('content');
            $table->char('type', 4);
            $table->timestamps();
            $table->unsignedInteger('uid_create');
            $table->unsignedInteger('uid_edit');
            $table->foreign('uid_create')->references('id')->on('users');
            $table->foreign('uid_edit')->references('id')->on('users');
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
