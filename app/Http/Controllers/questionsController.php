<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Input;
use App\Questions;
use App\Classif;
use App\Answers;
use Auth;
use App\Questions_tags;
use App\Questions_tags_rel;
use DB;

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
        // print_r($data["question"]);
        /* clients can see only question with status 0002 */
        if (!Auth::check() && $data["question"]->status != '0002') {
            return redirect('/questions');
        }
        $data['answers'] = Answers::where('qid', $id)->get();
        $data['tags'] = DB::table('questions_tags') //fix me :) use ORM
                ->join('questions_tags_rel', 'questions_tags.id', '=', 'questions_tags_rel.tid')
                ->where('questions_tags_rel.qid', '=', $id)
                ->get();
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
        $r = '<ul class="autocomplite-list">';
        if (Input::get("name") == "") {
            return '<span class="autocomplite-list" >Nav pēc kā meklēt</span>';
        }
        $tags = Questions_tags::where('name', 'LIKE', '%' . Input::get("name") . '%')->get();
        if (count($tags) == 0) {
            return '<span class="autocomplite-list">Nekas netika atrasts </span>';
        }
        foreach ($tags as $tag) {
            $r .= "<li onclick='QUESTIONS.TAGS.addRel($tag->id)' id='tag_id_$tag->id'>$tag->name</li>";
        }
        $r .='</ul>';
        return $r;
    }

    public function saveTag() {
        if (Input::get("name") == "") {
            return 'fail';
        }
        if (count(Questions_tags::where('name', Input::get("name"))->get()) > 0) {
            return 'already in database';
        }
        $tag = new Questions_tags;
        $tag->name = Input::get("name");
        $tag->save();
        return $tag->id;
    }

    public function saveRel() {
        $rel = new Questions_tags_rel;
        $rel->qid = Input::get("qid");
        $rel->tid = Input::get("tid");
        $rel->save();
    }

    public function deleteRel() {
        $rel = Questions_tags_rel::where('qid', Input::get("qid"))->where('tid', Input::get("tid"));
        $rel->delete();
    }

}
