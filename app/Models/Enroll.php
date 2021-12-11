<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function school_year() {
        return $this->belongsTo('App\Models\SchoolYear');
    }

    public function section() {
        return $this->belongsTo('App\Models\Section');
    }

    public function student() {
        return $this->belongsTo('App\Models\Student');
    }

    public function level() {
        return $this->belongsTo('App\Models\Level');
    }

    public function classenrolls() {
        return $this->hasMany('App\Models\ClassEnroll');
    }

    public static function checkHasPendingEnrollment() {
        $results = Enroll::where('student_id', auth()->user()->student()->first()->id)
        ->where('school_year_id', SchoolYear::currentYearAttr()->id)
        ->where('status', 'Pending')->get();

        return $results;
    }
}
