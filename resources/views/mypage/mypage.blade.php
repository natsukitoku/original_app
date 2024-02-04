@extends('layouts.app')

@section('content')
    <div class="all">
        <h1 style="margin-top: 32px">マイページ</h1>

        <div style="display: flex; justify-content: space-between">
            <div>
                <a class="back" href="{{ route('home') }}">&lt;戻る</a>
            </div>
            <div>
                <a class="link link-menu" href="{{ route('mypage.setting') }}">設定画面</a>
            </div>
        </div>

        <div style="margin-top: 16px">
            <div style="display: flex">
                <div>
                    <h1 style="font-size: 40px">{{ $user->name }}</h1>
                </div>
                <div class="announce" style="margin-left: 24px; margin-top:8px; position: relative">
                    @if (count($unWatchedCommentIds))
                        <i class="fas fa-exclamation fa-2x exclamation"></i>
                        <a href="{{ route('tweets.index') }}"><i class="far fa-comments fa-2x" style="color: black"></i>
                            <span class="message" style="color: black">未読メッセージが<br>あります</span></a>
                    @else
                        <a class="announce" href="{{ route('tweets.index') }}"><i class="far fa-comments fa-2x"
                                style="color: black"></i><span class="message"
                                style="color: black">未読メッセージは<br>ありません</span></a>
                    @endif
                </div>
                <div class="announce2" style="margin-left: 24px; margin-top:8px; position: relative;">
                    @if ($hasSoonDuedate)
                        <i class="fas fa-exclamation fa-2x exclamation2"></i>
                        <a href="{{ route('todos.index') }}"><i class="far fa-calendar-check fa-2x"
                                style="color: black"></i>
                            <span class="message2" style="color: black">期限が近いTodoが<br>あります</span></a>
                    @else
                        <a href="{{ route('todos.index') }}"><i class="far fa-calendar-check fa-2x"
                                style="color: black"></i>
                            <span class="message2" style="color: black">期限が近いTodoは<br>ありません</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <ul style="display: flex; justify-content: space-between; list-style:none">
            <li style="margin: 16px">
                <span style="font-size: 24px">留学
                    @if (count($abroadingPlans))
                        <h2>留学
                            @php

                                $abroadingPlan = $abroadingPlans->first();

                                $from_date = $abroadingPlan->from_date;

                                $end_date = $abroadingPlan->end_date;

                                $endDate = new DateTime($end_date);

                                $fromDate = new DateTime($from_date);

                                $now = new DateTime('now');

                                $diff = date_diff($now, $fromDate);

                                $endDiff = date_diff($now, $endDate);

                            @endphp
                            @if ($diff->y !== 0)
                                まで残り{{ $diff->y }}年{{ $diff->m }}ヶ月{{ $diff->d }}日!
                            @elseif ($diff->m !== 0)
                                まで残り{{ $diff->m }}ヶ月{{ $diff->d }}日!
                            @elseif($diff->invert == 0)
                                まで残り{{ $diff->d }}日!
                            @elseif($endDiff->y == 0 && $endDiff->m == 0 && $endDiff->d == 0 && $endDiff->invert == 1)
                                終了です！
                            @elseif($diff->invert == 1)
                                {{ $diff->d }}日!
                            @endif
                        @else
                            </br>未定
                    @endif
                </span>
            </li>
            <li style="margin: 16px">
                @if (count($abroadingPlans))
                    <span style="font-size: 24px">留学予定</span>
                    @foreach ($abroadingPlans as $abroadingPlan)
                        <p style="font-size: 24px; line-height:1em; margin-top: 8px">{{ $abroadingPlan->city->name }}
                        </p>
                    @endforeach
                @elseif (count($favorites))
                    <span style="font-size: 24px">気になる国</span></br>
                    @foreach ($favorites as $fav)
                        <p style="font-size: 24px">{{ App\Models\Country::find($fav->favoriteable_id)->name }}</p>
                    @endforeach
                @else
                    <span>留学</br>予定なし</span>
                @endif
            </li>
            <li style="margin: 16px">
                <span style="font-size: 24px">タスク完了数</span>
                <p style="font-size: 24px; text-align: center">{{ $done_count }}</p>
            </li>
        </ul>
        <hr>
        <div>
            <h4>公開中のTodo一覧</h4>
            @if (count($todos))
                @foreach ($todos as $todo)
                    <div class="card">
                        <div class="card-body" style="padding: 32px">
                            <div>
                                <h5 style="font-size: 24px">留学先:{{ $todo->abroadingPlan->city->name }}</h5>
                            </div>
                            <div style="margin: 32px">
                                <p style="margin-right: 8px; font-size: 16px">優先度:{{ $todo->priority_num }}</p>
                                <p style="font-size: 16px">期限:{{ $todo->duedate }}</p>
                            </div>
                            <div style="margin: 32px">
                                <h4>{{ $todo->content }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h6>現在公開中のTodoはありません。</h6>
            @endif
        </div>
        <hr>
        <div style="margin-top: 16px">
            <h4>つぶやき一覧</h4>
            @if (count($tweets))
                @foreach ($tweets as $tweet)
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $tweet->user->name }}</h5>
                            <div style="margin: 32px">
                                <h5>{{ $tweet->content }}</h5>
                            </div>
                            <div style="float: right">
                                <a class="link link-menu comment-link"
                                    href="{{ route('comments.create', $tweet) }}">コメントする</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h6>つぶやきはありません。</h6>
            @endif
        </div>
    </div>
    </div>
@endsection
