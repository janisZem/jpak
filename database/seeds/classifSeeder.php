<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class classifSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('classif')->delete();
        DB::table('classif')->insert([
            'name' => 'PARAGRAPH_STATE',
            'value' => 'Iesniegts',
            'code' => '0001']);
        DB::table('classif')->insert([
            'name' => 'PARAGRAPH_STATE',
            'value' => 'Apstiprināts',
            'code' => '0002']);
        DB::table('classif')->insert([
            'name' => 'ANSWER_STATUS',
            'value' => 'Iesniegts',
            'code' => '0001']);
        DB::table('classif')->insert([
            'name' => 'ANSWER_STATUS',
            'value' => 'Atbilde',
            'code' => '0002']);
    }

}
