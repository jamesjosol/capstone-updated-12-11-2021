<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function verification(User $user, $token) {
        if($user->remember_token!==$token) {
            return back()->with('Error', 'The token is invalid.');
        }

        $user->email_verified_at = now();
        $user->save();

        return back()->with('status', 'Your account has been verified.');
    }
}
