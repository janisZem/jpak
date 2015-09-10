<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions_tags extends Model {

    protected $table = "questions_tags";
    public $timestamps = false;

    public function tasks() {
        return $this->belongsToMany('App\Questions', 'question_tags_rel', 'qid');
    }

}
