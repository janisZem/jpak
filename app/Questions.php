<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model {

    public function question_classif() {
        return $this->hasMany('App\Classif', 'id', 'cid')->distinct();
    }

}
