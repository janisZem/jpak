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

    public function index() {
        if (Auth::check()) {
            $data['questions'] = Questions::all();
        } else {
            $data['questions'] = Questions::where('status', '0002')->get();
        }
        return view('questions/questionsList', $data);
    }

    public function store() {
        if (!Auth::check()) {
            return;
        }

        $validator = Validator::make([
                    'name' => Input::get("name"),
                    'email' => Input::get("email"),
                    'question' => Input::get("question")], [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255',
                    'question' => 'required',]
        );
        if ($validator->fails()) {
            return "Fields name, email and question are mandatory";
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

    public function show($title, $id) {
        if ($id == "") {
            return "";
        }
        $data["question"] = Questions::with('question_classif')
                ->where('id', $id)
                ->first();
        /* clients can see only question with status 0002 */
        if (!Auth::check() && $data["question"]->status != '0002') {
            return redirect('/questions');
        }
        $data['answers'] = Answers::where('qid', $id)->get();
        $data['question_tags'] = Questions_tags::all();
        return view('questions/question', $data);
    }

    public function update() {
        //implement new state answered
        $data = Questions::find(Input::get("id"));
        if (!$data || !Auth::check()) {
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

  
    public function getTags() {

        Question_tags::all();
    }

}
