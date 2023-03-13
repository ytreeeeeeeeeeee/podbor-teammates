<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as Req;

class AjaxController extends Controller
{
    public function endlessScrolling(Request $request) {
        $start_value = $request->input('start');

        if (Req::count() < $start_value){
            return null;
        }

        $result = Req::orderBy('id', 'desc')->skip($start_value-1)->take(20)->get();
        $html = '';
        foreach ($result as $req) {
            $html .= view('components.card-request', ['req' => $req])->render();
        }
        return $html;
    }
}
