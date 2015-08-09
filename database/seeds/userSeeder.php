<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class userSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->delete();
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'lietotaajs@gmail.com',
            'password' => Hash::make("parole123")]);
    }

}
