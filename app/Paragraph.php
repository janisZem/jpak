<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App;
class Paragraph extends Model {

    protected $table = 'paragraph';

    public function attrs() {
        return $this->hasMany('App\Paragraph_attrs', 'par_id')->distinct();
    }

}
