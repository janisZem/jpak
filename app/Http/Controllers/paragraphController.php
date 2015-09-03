<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Paragraph;
use App\Paragraph_attrs;
use Input;
use DB;
use Auth;

class paragraphController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $data['paragraphs'] = DB::table('paragraph')->where('type', 'P')->get();
        $data['rows'] = Paragraph::where('type', 'R')->get();
        return view('index', $data);
    }

    /*
     * Method to store all kind paragraphs
     * TYPE can be
     * P -  pargraphs main page /index
     * PL -  paragraphs legal page
     * R - pargraphs index page seeding from seeder pargraphSeeder file, default 3
     */

    public function store() {
        if (!Auth::check()) {
            return;
        }
        $data = Paragraph::find(Input::get("id"));
        if (!$data) {
            $data = new Paragraph;
            $data->type = Input::get("t");
            $data->uid_create = 1;
            $data->uid_edit = 1;
        }
        $data->title = Input::get("title");
        $data->content = Input::get("content");
        $data->save();
        /* update paragraph type = row custum parameters */
        if ('R' == Input::get("t")) {
            Paragraph_attrs::where('par_id', Input::get("id"))
                    ->where('name', 'ROW_URL_TEXT')
                    ->update(['value' => Input::get("urlText")]);
            Paragraph_attrs::where('par_id', Input::get("id"))
                    ->where('name', 'ROW_URL')
                    ->update(['value' => Input::get("url")]);
        }
        return $data->id;
    }

    public function destroy() {
        if (!Auth::check()) {
            return;
        }
        $data = Paragraph::find(Input::get("id"));
        $data->delete();
        return "OK";
    }

}
