@extends('layouts.app')

@section('content')
    <div class="all">
        <h1>レビュー一覧</h1>
        <a class="back" href="{{ route('home') }}">&lt;戻る</a>
        @foreach ($reviews as $review)
            <div class="card">
                <div class="card-header">
                    <h4>{{ $review->user->name }}</h4>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        @if ($review->user->id == Auth::id())
                            <div style="text-align: right">
                                <a href="{{ route('reviews.edit', $review) }}">編集</a>
                            </div>
                        @endif
                        <p>留学先：{{ $review->city->name }}</p>
                        @if ($review->recommendation_stars == 5)
                            <p>評価：★★★★★</p>
                        @elseif ($review->recommendation_stars == 4)
                            <p>評価：★★★★☆</p>
                        @elseif ($review->recommendation_stars == 3)
                            <p>評価：★★★☆☆</p>
                        @elseif ($review->reccomendation_stars == 2)
                            <p>評価：★★☆☆☆</p>
                        @elseif ($review->recommendation_stars == 1)
                            <p>評価：★☆☆☆☆</p>
                        @endif
                        <p>コメント：{{ $review->content }}</p>
                    </blockquote>
                </div>
            </div>
        @endforeach
    </div>
@endsection
