@extends('layouts.app')

@section('content')

<div style="margin: 80px">
    <h1>つぶやき編集</h1>
</div>
<form action="{{route('tweets.update')}}" method="POST">
    @csrf
    @method('PUT')
    <textarea name="content" id="content" cols="30" rows="10" placeholder="今の気持ちをつぶやこう!"></textarea>
    <button type="submit">つぶやく</button>
</form>
