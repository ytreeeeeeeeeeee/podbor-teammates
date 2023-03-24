<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageFormRequest;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index() {
        return view('chat');
    }

    public function messages() {
        return Message::where('author_id', Auth::user()->id)
            ->orWhere('receiver_id')
            ->get();
    }

    public function send(MessageFormRequest $request) {
        $message = Message::insert([
            [
                'author_id' => Auth::user()->id,
            ]
        ]);
    }
}
