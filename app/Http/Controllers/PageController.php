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
}
