<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageFormRequest;
use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index() {
        $user_id = Auth::user()->id;

        $chats = Chat::where('first_user_id', $user_id)
            ->orWhere('second_user_id', $user_id)
            ->get();

        $chats_info = [];

        foreach ($chats as $chat) {
            $user = $chat->first_user_id != $user_id ? $chat->first_user : $chat->second_user;
            $chats_info[] = ['id' => $chat->id, 'name' => $user->name, 'avatar' => $user->avatar];
        }

        return view('chat', compact('chats_info', 'user_id'));
    }

    public function messages(Request $request) {
        $chatId = $request->input('chatId');

        return Message::where('chat_id', $chatId)->get();
    }

    public function send(MessageFormRequest $request) {
        $messageData = $request->except('_token');

        $message = new Message();

        $message->author_id = Auth::user()->id;
        $message->chat_id = $messageData['chat_id'];
        $message->text = $messageData['text'];

        $message->save();

        MessageSent::dispatch(Auth::user(), Chat::find($messageData['chat_id']), $message);

        return $message;
    }
}
