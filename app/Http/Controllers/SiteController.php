<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() {
        return view('pages.home');
    }

    public function about() {
        return view('pages.about');
    }
}
