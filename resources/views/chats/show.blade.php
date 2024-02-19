@extends('layouts.app')

@section('content')
    <div class="all">
        <h1 style="margin-top: 32px">チャットルーム</h1>
        <div style="margin-bottom: 24px; margin-top:24px">
            <a class="back" href="{{ route('chats.index') }}">&lt;戻る</a>
        </div>
        @foreach ($chats as $chat)
        <div class="card">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between">
                        <h4 class="card-title">{{$chat->sender_id}}</h4>
                </div>
                <p style="font-size: 16px; margin-top: 16px">{{ $chat->content }}</p>
                <p>{{$chat->created_at}}</p>
            </div>
        </div>
        @endforeach
    </div>
@endsection
