<?php

namespace App\Http\Controllers;
use App\Olol;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class test extends Controller {

    //
    public function test() {
        $data['users'] = Olol::all();
        return view('testView', $data);
    }

}
