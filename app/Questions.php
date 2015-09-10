<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model {

    public function question_classif() {
        return $this->hasMany('App\Classif', 'id', 'cid')->distinct();
    }

    public function tags() {
        return $this->belongsToMany('App\Questions_tags', 'question_tags_rel', 'tid');
    }

}
