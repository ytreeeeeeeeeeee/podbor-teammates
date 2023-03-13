<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Models\Request as Req;
use App\Models\User;

class PageController extends Controller
{
    public function index() {
        $requests = Req::orderBy('id', 'desc')->take(12)->get();
        return view('index', ['reqs' => $requests]);
    }

    public function my_requests() {
        return view('my-requests');
    }

    public function profile($id) {
        $profile = User::findOrFail($id);
        return view('profile', compact('profile'));
    }

    public function request($id) {
        $req = Req::findOrFail($id);
        $author = $req->author;
        $game = $req->game;
        return view('request', compact('req', 'author', 'game'));
    }

    public function reg_auth() {
        return view('reg-auth');
    }

    public function games() {
        $games = Game::all();
        return view('games', compact('games'));
    }

    public function all_requests() {
        $reqs =  Req::orderBy('id', 'desc')->take(5)->get();
        return view('all-requests', compact('reqs'));
    }
}
