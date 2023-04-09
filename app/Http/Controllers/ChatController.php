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
    public function index(Request $request) {
        $active_chat = $request->only('activeChat')['activeChat'];

        $user_id = Auth::user()->id;

        $chats = Chat::where('first_user_id', $user_id)
            ->orWhere('second_user_id', $user_id)
            ->get();

        $chats_info = [];

        if ($active_chat == -1 && count($chats) > 0) {
            $active_chat = $chats[0]->id;
        }

        foreach ($chats as $chat) {
            $user = $chat->first_user_id != $user_id ? $chat->first_user : $chat->second_user;
            $chats_info[] = ['id' => $chat->id, 'name' => $user->name, 'avatar' => $user->avatar];
        }

        return view('chat', compact('chats_info', 'user_id', 'active_chat'));
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
    }

    public function addChat($id) {
        $user_id = Auth::user()->id;

        $chat = Chat::where(function ($query) use ($user_id, $id) {
                $query->where('first_user_id', $user_id)
                    ->where('second_user_id', $id);
            })
            ->orWhere(function ($query) use ($user_id, $id) {
                $query->where('first_user_id', $id)
                    ->where('second_user_id', $user_id);
            })->get();

        if ($chat->isEmpty()) {
            $newChat = new Chat();

            $newChat->first_user_id = Auth::user()->id;
            $newChat->second_user_id = $id;

            $newChat->save();

            return redirect(route('chat', ['activeChat' => $newChat->id]));
        }
        else {
            return redirect(route('chat', ['activeChat' => $chat[0]->id]));
        }

    }
}
