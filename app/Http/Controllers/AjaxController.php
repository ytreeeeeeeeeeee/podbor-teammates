<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as Req;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function endlessScrolling(Request $request) {
        $start_value = $request->input('start');
        $page = $request->input('page');
        $game = $request->input('game_id');

        if (Req::count() < $start_value){
            return null;
        }

        switch ($page) {
            case 'all-reqs':
                $result = Req::orderBy('id', 'desc')->skip($start_value-1)->take(20)->get();
                break;
            case 'my-reqs':
                $result = Req::orderBy('id', 'desc')->where('id', Auth::user()->id)->skip($start_value-1)->take(20)->get();
                break;
            case 'game-reqs':
                $result = Req::orderBy('id', 'desc')->where('game_id', $game)->skip($start_value-1)->take(20)->get();
                break;
            default:
                break;
        }

        $html = '';
        foreach ($result as $req) {
            $html .= view('components.card-request', ['req' => $req])->render();
        }
        return $html;
    }
}
