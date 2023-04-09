<?php

namespace App\Http\Controllers;

use App\Models\User;
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
                $result = Req::orderBy('created_at', 'desc')->where('status_id', 2)->skip($start_value-1)->take(20)->get();
                break;
            case 'my-reqs':
                $result = Req::orderBy('created_at', 'desc')->where('id', Auth::user()->id)->where('status_id', 2)->skip($start_value-1)->take(20)->get();
                break;
            case 'game-reqs':
                $result = Req::orderBy('created_at', 'desc')->where('game_id', $game)->where('status_id', 2)->skip($start_value-1)->take(20)->get();
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

    public function handleNotification(Request $request) {
        $data = $request->all();

        $profile = User::find($data['teammate']);

        return view('components.notification', ['profile' => $profile, 'owner' => $data['owner']]);
    }
}
