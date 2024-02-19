@extends('layouts.app')

@section('content')
    <div class="all">
        <h1 style="margin-top: 32px">レビュー編集</h1>
        <div>
            <a class="back" href="{{ route('reviews.index') }}">&lt;戻る</a>
        </div>
        <form action="{{ route('reviews.update', $review) }}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <label for="abroadingPlan">留学先選択</label>
                <select name="abroading_plan_id" id="abroadin_plan_id">
                    <option hidden>選択してください</option>
                    <option value="{{ $review->abroading_plan_id }}" selected>{{ $review->city->name }}</option>
                </select>
                {{-- <input type="hidden" value="{{ $abroadingPlan->city->id }}"> --}}
            </div>
            <div>
                <label for="stars">評価</label>
                <select name="recommendation_stars" id="recommendation_stars">
                    <option hidden>選択して下さい</option>
                    <option value="5">★★★★★</option>
                    <option value="4">★★★★☆</option>
                    <option value="3">★★★☆☆</option>
                    <option value="2">★★☆☆☆</option>
                    <option value="1">★☆☆☆☆</option>
                </select>
            </div>
            <div>
                <label for="content">コメント</label>
                <textarea name="content" id="content" cols="30" rows="10">{{ $review->content }}</textarea>
            </div>
            <button type="submit">登録</button>
        </form>
    </div>
@endsection
