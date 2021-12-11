<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teacher() {
        return $this->belongsTo('App\Models\Teacher');
    }

    public function subject() {
        return $this->belongsTo('App\Models\Subject');
    }

    public function classenrolls() {
        return $this->hasMany('App\Models\ClassEnroll');
    }
}
