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
        <h1>{{ $user->name }}</h1>
        <ul style="display: flex; justify-content: space-between; list-style:none">
            <li style="margin: 16px">
                <span style="font-size: 24px">留学
                    @if (count($abroadingPlans))
                        @php
                            $latestAbroadingPlan = $abroadingPlans->sortBy('from_date')->first();

                            $fromDate = $latestAbroadingPlan->from_date;

                            $date = new DateTime($fromDate);

                            $now = new DateTime('now');

                            $diff = date_diff($now, $date);
                        @endphp
                        @if ($diff->y !== 0)
                            まで残り</br>{{ $diff->y }}年{{ $diff->m }}月{{ $diff->d }}日!
                        @elseif ($diff->m !== 0)
                            まで残り</br>{{ $diff->m }}月{{ $diff->d }}日!
                        @elseif($diff->invert == 0)
                            まで残り</br>{{ $diff->d }}日!
                        @elseif($diff->invert == 1)
                            </br>{{ $diff->d }}日!
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
                        <p style="font-size: 24px">{{ $abroadingPlan->city->name }}</p>
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
            <h4>公開中のtodo一覧</h4>
            @if (count($todos))
                @foreach ($todos as $todo)
                    <div class="card">
                        <div class="card-body" style="padding: 32px">
                            <div>
                                <h5 style="font-size: 24px">留学先:{{ $todo->abroading_plan->city->name }}</h5>
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
                                <a class="link link-menu comment-link" href="{{ route('comments.create', $tweet) }}">コメントする</a>
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
