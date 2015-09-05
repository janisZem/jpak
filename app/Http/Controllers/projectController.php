<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Paragraph;

class projectController extends Controller {

    public function index() {
        $data['paragraphs'] = Paragraph::where('type', 'PM')->get();
        return view('project.project', $data);
    }

}
