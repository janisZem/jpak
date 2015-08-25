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
use App\Answers;
use Auth;
use App\Questions_tags;

class questionsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        if (Auth::check()) {
            $data['questions'] = Questions::all();
        } else {
            $data['questions'] = Questions::where('status', '0002')->get();
        }
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
        if ($id == "") {
            return "";
        }
        $data["question"] = Questions::with('question_classif')
                ->where('id', $id)
                ->first();
        $data['answers'] = Answers::where('qid', $id)->get();
        $data['question_tags'] = Questions_tags::all();
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

    public function update() {
        //implement new state answered
        $data = Questions::find(Input::get("id"));
        if (!$data) {
            return "not found";
        }
        $validator = Validator::make([
                    'title' => Input::get("title")], [
                    'title' => 'max:255',]
        );
        if ($validator->fails()) {
            return "i wanna more";
        }
        if (Input::get("title") != "") {
            $data->title = Input::get("title");
        }
        if (Input::get("question") != "") {
            $data->question = Input::get("question");
        }
        if (Input::get("status") != "") {
            $data->status = Input::get("status");
        }

        if (Input::get("state") != "") {
            $state = Classif::where('name', 'PARAGRAPH_STATE')
                    ->where('code', Input::get("state"))
                    ->first();
            if ($state->id) {
                $data->cid = $state->id;
            }
            $data->save();
            return $state;
        }
        $data->save();
        //return redirect("/question/$data->title/$data->id"); //maybe dynamic insert without refresh
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        
    }

    public function getTags() {
        Input::get("state");
    }

}
