<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Models\Request as Req;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index() {
        $requests = Req::orderBy('created_at', 'desc')->where('status_id', 2)->take(12)->get();
        return view('index', ['reqs' => $requests]);
    }

    public function my_requests() {
        $reqs =  Req::orderBy('created_at', 'desc')->where('author_id', Auth::id())->take(8)->get();
        return view('my-requests', compact('reqs'));
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
        $reqs =  Req::orderBy('created_at', 'desc')->where('status_id', 2)->take(8)->get();
        return view('all-requests', compact('reqs'));
    }

    public function add_request() {
        $games = Game::all();
        return view('add-request', compact('games'));
    }

    public function game_reqs($id) {
        $reqs =  Req::orderBy('created_at', 'desc')->where('game_id', $id)->where('status_id', 2)->take(8)->get();
        $game = Game::findorFail($id);
        return view('game-requests', compact('reqs', 'game'));
    }

    public function admin_panel() {
        $reqs = Req::orderBy('created_at', 'asc')->where('status_id', 1)->take(8)->get();
        $profiles = User::orderBy('created_at', 'asc')->where('status_id', 1)->take(8)->get();
        return view('admin-panel', compact('reqs', 'profiles'));
    }
}
