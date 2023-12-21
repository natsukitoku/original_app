@extends('layouts.app')

@section('content')
<div class="all">
    <h1 style="margin-top: 32px">友達一覧</h1>
    <div style="display: flex; justify-content: space-between"">
        <div>
            <a class="back" href="{{ route('home') }}">&lt;戻る</a>
        </div>
        <div>
            <a class="link link-menu" href="{{ route('follows.search_friends') }}">新しい友達を探す
                <i class="fas fa-user-plus"></i>
            </a>
        </div>
    </div>

    <div>
        @foreach ($followees as $followee)
            @php
                $user = $followee;
            @endphp
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="link" href="{{ route('follows.show', $user) }}">{{ $user->name }}</a>
                    </h4>
                    <form action="{{ route('follows.unfollow', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="followee_id" value="{{ $user->id }}">
                        <button class="btn btn-outline-success follow-btn" type="submit">unfollow</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
