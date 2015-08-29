<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paragraph;

class legalController extends Controller {

    public function index() {
        $data['paragraphs'] = Paragraph::where('type', 'PL')->get();
        return view('legal.legal', $data);
    }

}
