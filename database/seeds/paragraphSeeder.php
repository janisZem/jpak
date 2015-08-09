<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class paragraphSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // DB::table('paragraph')->where('type', 'R')->delete();
        DB::table('paragraph')->insert([
            'title' => 'Juridiskie pakalpojumi',
            'content' => 'Mūsu birojā darbojas speciālisti ar lielu pieredzi, kuri spēs atrast piemēroto risinājumu Jūsu situācijai. Mūsu birojs palīdzēs Jums pieņemt pareizāko lēmumu jautājumos, kas saistīti ar nekustamo īpašumu, intelektuālo īpašumu, kreditoru un debitoru parādu piedziņu, licencēšanu, fiziskās un juridiskās personas maksātnespējas procesu. Jautājumu risināšanai tiek piesaistīti zvērināti adv',
            'type' => 'R',
            'uid_create' => 1,
            'uid_edit' => 1,
        ]);
        DB::table('paragraph')->insert([
            'title' => 'Juridiskie pakalpojumi',
            'content' => 'Mūsu birojā darbojas speciālisti ar lielu pieredzi, kuri spēs atrast piemēroto risinājumu Jūsu situācijai. Mūsu birojs palīdzēs Jums pieņemt pareizāko lēmumu jautājumos, kas saistīti ar nekustamo īpašumu, intelektuālo īpašumu, kreditoru un debitoru parādu piedziņu, licencēšanu, fiziskās un juridiskās personas maksātnespējas procesu. Jautājumu risināšanai tiek piesaistīti zvērināti adv',
            'type' => 'R',
            'uid_create' => 1,
            'uid_edit' => 1,
        ]);
        DB::table('paragraph')->insert([
            'title' => 'Juridiskie pakalpojumi',
            'content' => 'Mūsu birojā darbojas speciālisti ar lielu pieredzi, kuri spēs atrast piemēroto risinājumu Jūsu situācijai. Mūsu birojs palīdzēs Jums pieņemt pareizāko lēmumu jautājumos, kas saistīti ar nekustamo īpašumu, intelektuālo īpašumu, kreditoru un debitoru parādu piedziņu, licencēšanu, fiziskās un juridiskās personas maksātnespējas procesu. Jautājumu risināšanai tiek piesaistīti zvērināti adv',
            'type' => 'R',
            'uid_create' => 1,
            'uid_edit' => 1,
        ]);
        // DB::table('paragraph_attrs')->where('name', 'ROW_URL')->delete();
        // DB::table('paragraph_attrs')->where('name', 'ROW_URL_TEXT')->delete();
        DB::table('paragraph_attrs')->insert([
            'name' => 'ROW_URL',
            'value' => 'http://localhost/jpak/public/',
            'par_id' => '1']);
        DB::table('paragraph_attrs')->insert([
            'name' => 'ROW_URL_TEXT',
            'value' => 'Lasīt vairāk >>',
            'par_id' => '1']);
        DB::table('paragraph_attrs')->insert([
            'name' => 'ROW_URL',
            'value' => 'http://localhost/jpak/public/',
            'par_id' => '2']);
        DB::table('paragraph_attrs')->insert([
            'name' => 'ROW_URL_TEXT',
            'value' => 'Lasīt vairāk >>',
            'par_id' => '2']);
        DB::table('paragraph_attrs')->insert([
            'name' => 'ROW_URL',
            'value' => 'http://localhost/jpak/public/',
            'par_id' => '3']);
        DB::table('paragraph_attrs')->insert([
            'name' => 'ROW_URL_TEXT',
            'value' => 'Lasīt vairāk >>',
            'par_id' => '3']
        );
    }

}
