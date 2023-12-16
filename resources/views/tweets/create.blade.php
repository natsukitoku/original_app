@extends('layouts.app')

@section('content')
    <h1 style="margin-top: 32px">つぶやき作成</h1>
    <div>
        <a class="back" href="{{route('tweets.index')}}">&lt;戻る</a>
    </div>
    <div style="margin-left: 56px">
        <form action="{{ route('tweets.store') }}" method="POST">
            @csrf
            <div style="margin-top: 16px">
                <textarea name="content" id="content" cols="30" rows="10" placeholder="今の気持ちをつぶやこう!"></textarea>
            </div>
            <div style="margin-left: 168px">
                <button class="btn btn-outline-success" type="submit">つぶやく</button>
            </div>
        </form>
    </div>
@endsection
