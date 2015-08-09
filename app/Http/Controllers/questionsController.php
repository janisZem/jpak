<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use App\Questions;
use App\Classif;

class questionsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $data['questions'] = Questions::all();
        return view('questions/questionsList', $data);
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
                    'email' => Input::get("email"),
                    'question' => Input::get("question")], [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255',
                    'question' => 'required',]
        );
        if ($validator->fails()) {
            return "i wanna more";
        }
        $data = new Questions;
        $data->title = Input::get("name");
        $data->question = Input::get("question");
        $data->status = "0001";
        $state = Classif::where('name', 'PARAGRAPH_STATE')
                ->where('code', '0001')//Iesniegts
                ->first();
        $data->cid = $state->id;
        $data->email = Input::get("email");
        $data->save();
        return redirect('/questions'); //maybe dynamic insert without refresh
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($title, $id) {
        if($id == ""){
            return "";
        }
        $data["question"] = Questions::find($id);
        return view('questions/question', $data);
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
