<?php

namespace App\Http\Controllers;

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

        return redirect(route('request', ['id' => $id]));
    }

    public function banRequest($id) {
        $req = Req::findOrFail($id);
        $req->status_id = 3;
        $req->save();

        return redirect(route('request', ['id' => $id]));
    }
}
