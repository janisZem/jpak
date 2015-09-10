<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class questionsTagsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('questions_tags')->delete();
        DB::table('questions_tags')->insert([
            'name' => 'Juridiskās tiesības',
            'value' => '',
            'code' => '']);
        DB::table('questions_tags')->insert([
            'name' => 'Projektu vadība',
            'value' => '',
            'code' => '']);
    }

}
