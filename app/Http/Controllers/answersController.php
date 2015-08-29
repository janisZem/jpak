<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Answers;
use App\Classif;
use Auth;
use Input;

class answersController extends Controller {

    public function store() {
        if (!Auth::check()) {
            return;
        }
        $validator = Validator::make([
                    'name' => Input::get("name"),
                    'surname' => Input::get("surname"),
                    'answer' => Input::get("answer")], [
                    'name' => 'max:255',
                    'surnmae' => 'max:255',
                    'answer' => 'required',]
        );
        if ($validator->fails()) {
            return "Answer is mandatory";
        }
        if (Input::get("id") != "") {
            $data = Answers::find(Input::get("id"));
        } else {
            $data = new Answers;
        }
        $data->name = Input::get("name");
        $data->surname = Input::get("surname");
        $data->answer = Input::get("answer");
        $satus = Classif::where('name', 'ANSWER_STATUS')
                ->where('code', '0002')//Atbildēts
                ->first();
        $data->cid = $satus->id;
        $data->qid = Input::get("question_id");
        $data->save();
        if (Input::get("question_id") != "") {
            return redirect("/question/" . Input::get("question_id") . "/" . Input::get("question_id"));
        } else {
            return redirect('/question'); //maybe dynamic insert without refresh
        }
    }

    public function destroy() {
        if (!Auth::check()) {
            return;
        }
        $data = Answers::find(Input::get("id"));
        $data->delete();
        return "OK";
    }

}
