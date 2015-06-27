<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class test extends Controller {

    //
    public function test() {
        $data['name'] = 'olol';
        return view('testView', $data);
    }

}
