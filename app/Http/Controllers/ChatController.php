<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ChatRoom;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {

        // フォローしているユーザーの情報を取得
        $followees = Auth::user()->followees;

        $myChatRooms = ChatRoom::where('founder_id', '=', Auth::id())
            ->orWhere('friend_id', '=', Auth::id())
            ->get();


        return view('chats.index', compact('followees', 'myChatRooms'));
    }

    public function create()
    {
        // フォローしているユーザーの情報を取得
        $followees = Auth::user()->followees;

        return view('chats.create', compact('followees'));
    }

    public function chatRooms_store(Request $request)
    {
        $chat = new Chat();
        $chat->founder_id = Auth::id();
        $chat->friend_id = $request->input('friend_id');
        $chat->save();

        return to_route('chats.show');
    }

    public function show(ChatRoom $chatRoom)
    {
        $chatRoomId = $chatRoom->id;

        $chats = Chat::where('chat_room_id', '=', $chatRoomId)->get();

        return view('chats.show', compact('chats'));
    }

    public function update(Chat $chat, Request $request)
    {
    }
}
