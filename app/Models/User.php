<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'middleName',
        'contactNo',
        'username',
        'email',
        'password',
        'role',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student() {
        return $this->hasOne('App\Models\Student');
    }

    public function isAdmin() {
        return auth()->user()->role == 1;
    }


    public static function usersNotStudent() {
        $users = User::doesntHave('student')->where('role', '2')->orderBy('lastName')->get();
        $list = [];
        foreach($users as $u) {
            // $role = $u->role == 1 ? 'Administrator' : 'Normal';
            // $list[$u->id] = $u->lastName . ", " . $u->firstName . "     ($role)";
            $list[$u->id] = $u->lastName . ", " . $u->firstName;
        }
        return $list;
    }
}
