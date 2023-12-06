@extends('layouts.app')

@section('content')
<div style="margin: 24px">
    <div style="margin-top: 80px">
        <h1>留学先</h1>
    </div>
    <div>
        <a href="{{route('mypage.create.plans')}}">新規登録する</a>
        <a href="{{route('mypage.edit.plans')}}">編集する</a>
    </div>
    <div>
       <p>国名：</p>
    </div>
    <div>
        <p>都市名：</p>
    </div>
</div>
@endsection
