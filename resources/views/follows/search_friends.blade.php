@extends('layouts.app')

@section('content')
    <div class="all">
        <h1 style="margin-top: 32px">友達を探す</h1>
        <div>
            <a class="back" href="{{ route('follows.index') }}">&lt;戻る</a>
        </div>
        <div>
            <div class="input-group" style="width: 240px; margin-top:24px; margin-left: auto; margin-right: 0">
                <form action="{{ route('follows.search_friends') }}" method="get">
                    @csrf
                    <div style="display: flex; height:36px">
                        <input type="text" name="keyword" class="form-control" placeholder="留学先検索">
                        <div>
                            <button class="btn btn-outline-success" type="submit" id="button-addon2"
                                style="margin-left: 8px; width: 80px"><i class="fas fa-search"></i> 検索</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div style="margin-top: 32px">
            <ul>
                @foreach ($users as $user)
                    <form action="{{ route('follows.follow') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h4>
                                    <a class="link card-title"
                                        href="{{ route('follows.show', $user) }}">{{ $user->name }}</a>
                                </h4>
                                @if ($user->abroading_plans !== null)
                                    <input type="hidden" name="followee_id" value="{{ $user->id }}">
                                    <span>留学先:</span>
                                    @foreach ($user->abroading_plans as $abroadingPlan)
                                        <span>{{ $abroadingPlan->city->name }}</span>
                                    @endforeach
                                    <div>
                                        <button class="btn btn-outline-success follow-btn" type="submit">follow</button>
                                    </div>
                                @else
                                    <input type="hidden" name="followee_id" value="{{ $user->id }}">
                                    <span>留学先:なし</span>
                                    <div>
                                        <button class="btn btn-outline-success follow-btn" type="submit">follow</button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
