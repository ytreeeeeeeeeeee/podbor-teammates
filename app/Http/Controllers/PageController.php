<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return view('index');
    }

    public function my_requests() {
        return view('my-requests');
    }

    public function profile($id) {
        return view('profile');
    }

    public function request($id) {
        return view('request');
    }

    public function reg_auth() {
        return view('reg-auth');
    }

    public function games() {
        return view('games');
    }
}
