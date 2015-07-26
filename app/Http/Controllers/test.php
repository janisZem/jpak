<?php

namespace App\Http\Controllers;

use App\Olol;
use Input;
use Hash;
use App\Http\Controllers\Controller;

class test extends Controller {

    //
    public function test() {
        $data['users'] = Olol::all();
        return view('testView', $data);
    }

    public function save() {
        $data = new Olol;
        $data->name = Input::get("name");
        $data->email = Input::get("email");
        $data->password = Hash::make(Input::get("psw"));
        $data->save();
        return "saved";
    }

}
