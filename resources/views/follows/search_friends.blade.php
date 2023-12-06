@extends('layouts.app')

@section('content')
<div style="margin-top: 80px">
    <h1>友達を探す</h1>
    <ul>
        @foreach ($users as $user)
        <form action="{{route('follows.follow')}}" method="POST">
            @csrf
            <li>
                <span>{{$user->name}}</span>
                <input type="hidden" name="followee_id" value="{{$user->id}}">
                <button type="submit">フォローする</button>
            </li>
        </form>
        @endforeach
    </ul>
</div>
<div>
    <a href="{{route('follows.index')}}">戻る</a>
</div>

