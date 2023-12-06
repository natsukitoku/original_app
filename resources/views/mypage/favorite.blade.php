@extends('layouts.app')

@section('content')
<div style="margin-top: 80px">
    <h1>気になる国一覧</h1>
</div>
<div>
    <a href="{{route('mypage')}}">戻る</a>
</div>
<div>
    @foreach ($favorites as $fav)
    <ul>
        <li>{{App\Models\Country::find($fav->favoriteable_id)->name}}</li>
    </ul>
    @endforeach
</div>
