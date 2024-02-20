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
        $chatRoom = new ChatRoom();
        $chatRoom->founder_id = Auth::id();
        $chatRoom->friend_id = $request->input('friend_id');
        $chatRoom->save();

        return to_route('chats.show');
    }

    public function show(ChatRoom $chatRoom)
    {
        $chatRoomId = $chatRoom->id;

        $chats = Chat::where('chat_room_id', '=', $chatRoomId)->get();

        return view('chats.show', compact('chats', 'chatRoom'));
    }

    public function chats_store(Request $request, ChatRoom $chatRoom)
    {
        $chat = new Chat();
        $chat->chat_room_id = $chatRoom->id;
        $chat->sender_id = Auth::id();
        $chat->receiver_id = $request->input('receiver_id');
        $chat->content = $request->input('content');
        $chat->save();

        return redirect()->back();
    }

    public function chat_rooms_destroy(ChatRoom $chatRoom)
    {
        $chatRoom->delete();

        return redirect()->back();
    }

    public function update(Chat $chat, Request $request)
    {
    }
}
