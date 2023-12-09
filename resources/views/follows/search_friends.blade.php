@extends('layouts.app')

@section('content')
    <div style="margin-top: 80px">
        <h1>友達を探す</h1>
    </div>
    <div>
        <a href="{{ route('follows.index') }}">&lt;戻る</a>
    </div>
    <div>
        <ul>
            @foreach ($users as $user)
                <form action="{{ route('follows.follow') }}" method="POST">
                    @csrf
                    <li>
                        <span>{{ $user->name }}</span>
                        @if (isset($abroading_plans))
                            @foreach ($user->abroading_plans as $abroading_plan)
                                <p>{{ $user->abroading_plan->city->name }}</p>
                            @endforeach
                        @endif
                        <input type="hidden" name="followee_id" value="{{ $user->id }}">
                        <button type="submit">follow</button>
                    </li>
                </form>
            @endforeach
        </ul>
    </div>
