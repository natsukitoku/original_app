@extends('layouts.app')

@section('content')

    <h1>
        マイページ</h1>
    <div>
        <a href="{{ route('home') }}">&lt;戻る</a>
    </div>
    <div>
        <a href="{{ route('mypage.setting') }}">設定画面</a>
    </div>
    <div>
        <h1>{{ $user->name }}</h1>
        <ul style="display: flex">
            <li style="margin: 16px">
                <span>留学
                    @if (count($abroadingPlans))
                        @php
                            $latestAbroadingPlan = $abroadingPlans->sortBy('from_date')->first();

                            $fromDate = $latestAbroadingPlan->from_date;

                            $date = new DateTime($fromDate);

                            $now = new DateTime('now');

                            $diff = date_diff($now, $date);
                        @endphp
                        @if ($diff->y !== 0)
                            まで残り{{ $diff->y }}年{{ $diff->m }}月{{ $diff->d }}日!
                        @elseif ($diff->m !== 0)
                            まで残り{{ $diff->m }}月{{ $diff->d }}日!
                        @elseif($diff->invert == 0)
                            まで残り{{ $diff->d }}日!
                        @elseif($diff->invert == 1)
                            {{ $diff->d }}日!
                        @endif
                    @endif
                </span>
            </li>
            <li style="margin: 16px">
                @if ($abroadingPlans)
                    <span>留学予定</span></br>
                    @foreach ($abroadingPlans as $abroadingPlan)
                        {{ $abroadingPlan->city->name }}</br>
                    @endforeach
                @else
                    <span>気になる国</span></br>
                    @foreach ($favorites as $fav)
                        {{ App\Models\Country::find($fav->favoriteable_id)->name }}
                    @endforeach
                @endif
            </li>
            <li style="margin: 16px">
                <span>タスク完了数</span>
                <p>{{ $done_count }}</p>
            </li>
        </ul>
        <div>
            <h4>公開中のtodo一覧</h4>
            @foreach ($todos as $todo)
                <div style="border: 1px solid">
                    <div style="margin-top: 32px; display: flex">
                        <h5>留学先:{{ $todo->abroading_plan->city->name }}</h5>
                        <p style="margin-right: 8px">優先度:{{ $todo->priority_num }}</p>
                        <p>期限:{{ $todo->duedate }}</p>
                    </div>
                    <div style="margin: 32px">
                        <h4>{{ $todo->content }}</h4>
                    </div>
                </div>
            @endforeach
        </div>
        <div style="margin-top: 16px">
            <h4>つぶやき一覧</h4>
            @foreach ($tweets as $tweet)
                <div style="border: solid 1px; margin: 16px">
                    <p>{{ $tweet->user->name }}</p>
                    <p>{{ $tweet->content }}</p>
                </div>
                <a href="{{ route('comments.create', $tweet) }}">コメントする</a>
            @endforeach
        </div>

    </div>
@endsection
