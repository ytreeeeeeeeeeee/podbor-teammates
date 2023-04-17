<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use App\Models\User;
use App\Notifications\ContinueOnlineSearch;
use App\Notifications\FoundTeammateNotification;
use App\Notifications\RedirectToChat;
use App\Notifications\RequestDecisionNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Request as Req;
use Carbon\Carbon;

class RequestController extends Controller
{
    public function addReq(Request $request) {
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

    public function requestDecision(Request $request, $id){
        $req = Req::findOrFail($id);
        $action = $request->only('action')['action'];

        switch ($action) {
            case 'approve':
                $req->status_id = 2;
                $req->save();
                break;
            case 'ban':
                $req->status_id = 3;
                $req->save();
                break;
            default:
                break;
        }

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
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $game_id = $queue_info['game'];

        if(!$request->ajax()) {
            $exception = [];
        }
        else {
            $exception = (array) json_decode($queue_info['exception']);
        }

        $teammate = Queue::orderBy('created_at', 'asc')->whereNotIn('user_id', $exception)->where('game_id', $game_id)->where('user_id', '<>', Auth::user()->id)->take(1)->get();

        if ($teammate->isEmpty()){
            $queue_user = new Queue();

            $queue_user->user_id = Auth::user()->id;
            $queue_user->game_id = $game_id;

            $queue_user->save();

            if (!$request->ajax())
                return redirect(route('online'));
            else
                return true;
        }
        else {
            $teammate_user = User::find($teammate[0]->user_id);
            $teammate_user->notify(new FoundTeammateNotification($teammate_user->id, Auth::user()->id));
            Session::flash('found_teammate', [
                'teammate' => $teammate_user->id,
            ]);
            if (!$request->ajax())
                return redirect(route('online'));
            else
                return false;
        }
    }

    public function leaveQueue() {
        $queue = Queue::where('user_id', Auth::user()->id);
        $queue->delete();

        return redirect(route('online'));
    }

    public function onlineDecision(Request $request, $id) {
        $req = Queue::firstWhere('user_id', $id);
        $data = $request->except('_token');
        $owner = filter_var($data['owner'], FILTER_VALIDATE_BOOLEAN);
        $teammate = User::find($data['teammate']);
        $user = User::find(Auth::user()->id);

        switch ($data['action']) {
            case 'approve':
                if (is_null($req->first_accept)) {
                    $req->first_accept = true;
                    $req->save();

                    $teammate->notify(new RequestDecisionNotification(true, $teammate->id));
                }
                else {
                    $req->delete();
                    $teammate->notify(new RedirectToChat($teammate->id, Auth::user()->id));
                    $teammate->notify(new RedirectToChat(Auth::user()->id, $teammate->id));
                }
                break;
            case 'ban':
                $req->first_accept = null;
                $req->save();
                $teammate->notify(new ContinueOnlineSearch($teammate->id, Auth::user()->id, !$owner));
                $user->notify(new ContinueOnlineSearch(Auth::user()->id, $teammate->id, $owner));
                break;
            default:
                break;
        }
    }

    public function declineRequest(Request $request, $id) {
        $data = $request->except('_token');
        $req = Queue::firstWhere('user_id', $id);
        $teammate = User::find($data['teammate']);

        $req->first_accept = null;
        $req->save();

        $teammate->notify(new ContinueOnlineSearch($teammate->id, Auth::user()->id, true));
    }
}
