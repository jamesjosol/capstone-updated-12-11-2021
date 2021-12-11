<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassEnroll extends Model
{
    use HasFactory;

    public function enroll() {
        return $this->belongsTo('App\Models\Enroll');
    }

    public function session() {
        return $this->belongsTo('App\Models\Session');
    }
}
