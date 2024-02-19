@extends('layouts.app')

@section('content')
    <div class="all">
        <h1 style="margin-top: 32px">チャット一覧</h1>
        <div style="margin-bottom: 24px; margin-top:24px">
            <a class="back" href="{{ route('tweets.index') }}">&lt;戻る</a>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#createchats"
            style="border: none;padding: 0">
            新しいチャットを作成
        </button>
        <div>
            <ul>
                @foreach ($myChatRooms as $chatRoom)
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
                    @if ($user->id !== Auth::id())
                        <li>{{ $user->name }}
                            <a href="{{route('chats.show', $chatRoom)}}">チャットルームへ</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <!--logout Modal -->
        <div class="modal fade" id="createchats" tabindex="-1" aria-labelledby="createChatsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createChatsModalLabel">新しいチャットの作成</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @php
                        $users = $followees;
                    @endphp
                    <form action="{{ route('chatRooms.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="friend_id">チャット相手を選択</label>
                            <select name="friend_id" id="friend_id">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                            <button type="submit" class="btn btn-primary">決定</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
