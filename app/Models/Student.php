<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'firstName',
        'lastName',
        'middleName',
        'lrn',
        'gender',
        'birthDate',
        'birthPlace',
        'civilStatus',
        'nationality',
        'religion',
        'fatherName',
        'fatherOccup',
        'fatherContact',
        'motherName',
        'motherOccup',
        'motherContact',
        'guardianName',
        'guardianContact',
        'barangay',
        'town',
        'province',
        'grade_LVL',
        'elemSchool',
        'elemSchlAddr',
        'elemYrAttnd',
        'secondarySchool',
        'secondarySchlAddr',
        'secondaryYrAttnd',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function enrolls() {
        return $this->hasMany('App\Models\Enroll');
    }

}
