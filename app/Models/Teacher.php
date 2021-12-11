<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sections() {
        return $this->hasMany('App\Models\Section');
    }

    public function sessions() {
        return $this->hasMany('App\Models\Session');
    }

    public static function list() {
        $teachers = Teacher::all();
        $list = [];
        foreach($teachers as $t) {
            $list[$t->id] = $t->lastName . ", " . $t->firstName;
        }
        return $list;
    }
}
