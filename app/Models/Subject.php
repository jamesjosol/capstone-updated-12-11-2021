<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sessions() {
        return $this->hasMany('App\Models\Session');
    }

    public static function list() {
        $subjects = Subject::all();
        $list = [];
        foreach($subjects as $s) {
            $list[$s->id] = $s->subjectName;
        }
        return $list;
    }
}
