<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Paragraph;
use App\Paragraph_attrs;
use Input;
use DB;

class paragraphController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $data['paragraphs'] = DB::table('paragraph')->where('type', 'P')->get();
        $data['rows'] = Paragraph::with('attrs')->where('type', 'R')->get();
        return view('html', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store() {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy() {
        $data = Paragraph::find(Input::get("id"));
        $data->delete();
        return "OK";
    }

}
