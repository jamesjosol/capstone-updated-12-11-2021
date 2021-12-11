<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teacher() {
        return $this->belongsTo('App\Models\Teacher');
    }

    public function level() {
        return $this->belongsTo('App\Models\Level');
    }

    public function enrolls() {
        return $this->hasMany('App\Models\Enroll');
    }

    public static function list() {
        $sections = Section::all();
        $list = [];
        foreach($sections as $s) {
            $list[$s->id] = 'Name: ' . $s->name . '  | Room: ' . $s->room . ' | Adviser: ' . $s->teacher->firstName . ' ' . $s->teacher->lastName;
        }
        return $list;
    }
}
