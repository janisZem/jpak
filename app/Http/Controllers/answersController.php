<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Answers;
use App\Classif;
use Input;

class answersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
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
        // print_r(Input::get("name"));
        $validator = Validator::make([
                    'name' => Input::get("name"),
                    'surname' => Input::get("surname"),
                    'answer' => Input::get("answer")], [
                    'name' => 'max:255',
                    'surnmae' => 'max:255',
                    'answer' => 'required',]
        );
        if ($validator->fails()) {
            return "i wanna more";
        }
        if (Input::get("id") != "") {
            $data = Answers::find(Input::get("id"));
        } else {
            $data = new Answers;
        }
        $data->name = Input::get("name");
        $data->surname = Input::get("surname");
        $data->answer = Input::get("answer");
        $state = Classif::where('name', 'PARAGRAPH_STATE')
                ->where('code', '0001')//Iesniegts
                ->first();
        $data->cid = $state->id; ///fix this latter
        $data->qid = Input::get("question_id");
        $data->save();
        return redirect('/questions'); //maybe dynamic insert without refresh
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
    public function destroy($id) {
        //
    }

}
