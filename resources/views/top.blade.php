@extends('layouts.app')

@section('content')
    <div class="bg-warning-subtle" style="padding-bottom: 32px">
        <div>
            <div>
                <div class="header">
                    <h1 class="title">ワーホリンク</h1>
                    <h6 class="sub-title">COMMUNITY FOR WORKING HOLIDAY</h6>
                </div>
                <img class="people" src="{{ asset('img/people.jpeg') }}" alt="人々のイラスト">
            </div>
        </div>
        <div class="all">
            <div style="margin-bottom: 16px">
                <div style="display:flex;">
                    <img class="hukidashi2" src="{{ asset('img/hukidashi-left.png') }}">
                    <h5>ワーキングホリデーご検討中の皆さん！</h5>
                    <img class="hukidashi2" src="{{ asset('img/hukidashi-right.png') }}">
                </div>
                <h2>こんなお悩みありませんか...？</h2>
            </div>
            <div>
                <div style="display:flex; justify-content:space-between;flex-wrap:wrap">
                    <div class="worries">
                        <p style="line-height: 3;margin:0">行くならどの国？</p>
                        <img class="hukidashi" src="{{ asset('img/hukidashi.png') }}" alt="吹き出し">
                        <img class="people-img" src="{{ asset('img/woman2.png') }}" alt="悩む女性">
                    </div>
                    <div class="worries">
                        <p style="line-height: 3;margin:0">出発前に準備する物は？</p>
                        <img class="hukidashi" src="{{ asset('img/hukidashi.png') }}" alt="吹き出し">
                        <img class="people-img" src="{{ asset('img/man2.png') }}" alt="悩む男性">
                    </div>
                    <div class="worries">
                        <p style="margin:0;">ワーホリについて聞ける友達がいない</p>
                        <img class="hukidashi" src="{{ asset('img/hukidashi.png') }}" alt="吹き出し">
                        <img class="people-img" src="{{ asset('img/woman1.png') }}" alt="悩む女性">
                    </div>
                    <div class="worries" style="margin-right: 0">
                        <p style="margin: 0">現地で友達出来るかな、、、</p>
                        <img class="hukidashi" src="{{ asset('img/hukidashi.png') }}" alt="吹き出し">
                        <img class="people-img" src="{{ asset('img/man3.png') }}" alt="悩む男性">
                    </div>
                </div>
                <h3 style="margin: 24px 0px">このような悩みを解消できるのが&nbsp;<span class="title2"
                        style="    font-size: 32px;">ワーホリンク！</span>
                </h3>
                <div style="display: flex">
                    <img style="height: 96px; width:96px" src="{{ asset('img/woman4.png') }}" alt="">
                    <ul>
                        <li>興味のある国に滞在している人と繋がって自分にぴったりの国を見つけよう！</li>
                        <li>友達のTodoリストを参考にすれば忘れ物なく出発できる！</li>
                        <li>同じ国に留学予定の人、または留学中の人と繋がることができる！</li>
                        <li>出発前に現地で助け合える友達を作ることができる！</li>
                    </ul>
                </div>
                <div style="margin-top: 24px">
                    <h4><span class="title2">ワーホリンク</span>で友達の輪を広げ、現地で最大限楽しみませんか？</h4>
                </div>
            </div>
            <div style="text-align: center; margin-top: 24px">
                <p>新規登録&nbsp;/&nbsp;ログインはこちらから！</p>
                <a style="text-decoration: none; color:black;font-size:16px" href="{{ route('register') }}">新規登録&nbsp;</a>
                <span>|</span>
                <a style="text-decoration: none;color:black;font-size:16px" href="{{route('login')}}">&nbsp;ログイン</a>
            </div>
        </div>
    </div>
@endsection
