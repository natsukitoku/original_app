@extends('layouts.app')

@section('content')
    <div class="all">
        @php
            if ($chatRoom->founder_id == Auth::id()) {
                $userId = $chatRoom->friend_id;

                $user = \App\Models\User::where('id', '=', $userId)->first();
            }
            if ($chatRoom->friend_id == Auth::id()) {
                $userId = $chatRoom->founder_id;

                $user = \App\Models\User::where('id', '=', $userId)->first();
            }
        @endphp
        <h1 style="margin-top: 32px">{{ $user->name }}とのチャットルーム</h1>
        <div style="margin-bottom: 24px; margin-top:24px">
            <a class="back" href="{{ route('chats.index') }}">&lt;戻る</a>
        </div>
        <div>
        </div>
        @foreach ($chats as $chat)
            @php
                if ($chat->sender_id == Auth::id()) {
                    $userId = $chat->receiver_id;

                    $user = \App\Models\User::where('id', '=', $userId)->first();
                }
                if ($chat->receiver_id == Auth::id()) {
                    $userId = $chat->sender_id;

                    $user = \App\Models\User::where('id', '=', $userId)->first();
                }
            @endphp
            <div class="card">
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between">
                        @if ($user->id == $chat->sender_id)
                            <h4 class="card-title">{{ $user->name }}</h4>
                        @else
                            <h4>{{ Auth::user()->name }}</h4>
                        @endif
                    </div>
                    <p style="font-size: 16px; margin-top: 16px">{{ $chat->content }}</p>
                    <p>{{ $chat->created_at }}</p>
                </div>
            </div>
        @endforeach
        <div>
            <form action="{{ route('chats.store', $chatRoom) }}" method="POST">
                @csrf
                <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                <textarea name="content" id="content" cols="80" rows="3"></textarea>
                <button type="submit">送信</button>
            </form>
        </div>
    </div>
@endsection
