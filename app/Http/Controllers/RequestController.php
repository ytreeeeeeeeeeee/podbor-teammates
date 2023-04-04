<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use App\Models\User;
use App\Notifications\FoundTeammateNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Request as Req;
use Carbon\Carbon;

class RequestController extends Controller
{
    public function add_req(Request $request) {
        $reqData = $request->all();

        $validator = Validator::make($reqData, [
            'title' => 'required',
            'description' => 'required',
            'game' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('add-req'))
                ->withErrors($validator)
                ->withInput();
        }

        $req = new Req();
        $req->title = $reqData['title'];
        $req->description = $reqData['description'];
        $req->game_id = $reqData['game'];
        $req->author_id = Auth::user()->id;
        $req->created_at = Carbon::now();

        $req->save();

        return redirect(route('main-page'));
    }

    public function approveRequest($id) {
        $req = Req::findOrFail($id);
        $req->status_id = 2;
        $req->save();

        return redirect(route('admin-panel'));
    }

    public function banRequest($id) {
        $req = Req::findOrFail($id);
        $req->status_id = 3;
        $req->save();

        return redirect(route('admin-panel'));
    }

    public function deleteRequest($id) {
        $req = Req::find($id);
        if ($req->author->id === Auth::user()->id) {
            $req->delete();

            return redirect(route('main-page'));
        }

        return redirect(route('main-page'));
    }

    public function onlineSearch(Request $request) {
        $queue_info = $request->except('_token');

        $validator = Validator::make($queue_info, [
            'game' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('online'))
                ->withErrors($validator)
                ->withInput();
        }

        $game_id = $queue_info['game'];

        $teammate = Queue::orderBy('id', 'asc')->where('game_id', $game_id)->where('user_id', '<>', Auth::user()->id)->take(1)->get();

        if (!count($teammate)){
            $queue_user = new Queue();

            $queue_user->user_id = Auth::user()->id;
            $queue_user->game_id = $game_id;

            $queue_user->save();

            return redirect(route('online'));
        }
        else {
            $teammate_user = User::find($teammate[0]->user_id);
            $teammate_user->notify(new FoundTeammateNotification());
        }

        return redirect(route());
    }
}
