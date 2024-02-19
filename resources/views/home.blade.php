@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>クリック時にポップアップを表示</title>
        <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
        <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
        <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
        <style>
            body {
                margin: 0;
                padding: 0;
            }

            #map {
                position: absolute;
                top: 0;
                bottom: 0;
                width: 100%;
            }

            .marker {
                background-image: url('mapbox-icon.png');
                background-size: cover;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                cursor: pointer;
            }

            .favorite {
                color: deeppink;
            }

            .mapboxgl-popup-content {
                outline: none;
                border: none;
                text-decoration: none;
            }
        </style>

    </head>

    <body>
        <style>
            .mapboxgl-popup {
                max-width: 400px;
                font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
            }
        </style>
        <div class="container" style="margin-top: 48px; text-align:center">
            <h1>Hello! {{ $user->name }}さん!</h1>
            @if ($abroadingPlans)
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
                    @if ($endDiff->y == 0 && $endDiff->m == 0 && $endDiff->d == 0 && $endDiff->invert == 1)
                        終了です！</br>お疲れ様でした！
                    @elseif ($diff->invert == 1 && $diff->y !== 0)
                        {{ $diff->y }}年{{ $diff->m }}ヶ月{{ $diff->d }}日!
                    @elseif ($diff->invert == 1 && $diff->m !== 0)
                        {{ $diff->m }}ヶ月{{ $diff->d }}日!
                    @elseif ($diff->invert == 1)
                        {{ $diff->d }}日!
                    @elseif ($diff->y !== 0)
                        まで残り{{ $diff->y }}年{{ $diff->m }}ヶ月{{ $diff->d }}日!
                    @elseif ($diff->m !== 0)
                        まで残り{{ $diff->m }}ヶ月{{ $diff->d }}日!
                    @elseif($diff->invert == 0)
                        まで残り{{ $diff->d }}日!
                    @endif
                </h2>
            @endif
            @if (isset($doneAbroadingPlan))
                <h4>留学先レビュー登録にご協力お願いいたします！</h4>
                <a style="font-size: 16px" href="{{ route('reviews.create') }}">レビューを作成</a>
            @endif
        </div>
        <div id="map"></div>
        <div class="all" style="margin-top: 560px">
            <div style="margin-bottom: 16px">
                <div style="text-align: right">
                    <h5 style="margin: 0px;padding:0px">先輩たちの声を参考にしてみよう！</h5>
                    <a style="font-size: 16px" href="{{ route('reviews.index') }}">留学先レビューはこちら</a>
                </div>
            </div>
            <h2>ワーホリ協定国一覧</h2>
            <table class="table table-sm" style="margin-top:32px">
                <tr style="font-size: 16px">
                    <th>国名</th>
                    <th>応募可能時期</th>
                    <th>年間発給数</th>
                    <th>お気に入り</th>
                </tr>
                @foreach ($countries as $country)
                    <tr>
                        <td>{{ $country->name }}</td>
                        <td>{{ $country->visa_information->applyterm }}</td>
                        <td>{{ $country->visa_information->people }}</td>
                        <td>
                            @if ($country->isFavoritedBy(Auth::user()))
                                <a class="link fav" href="{{ route('countries.favorites', $country) }}">
                                    <i class="fa fa-heart"></i>
                                    お気に入り解除
                                </a>
                            @else
                                <a class="link fav" href="{{ route('countries.favorites', $country) }}">
                                    <i class="fa fa-heart"></i>
                                    お気に入り
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>

            <script>
                // セキュリティの観点でトークンはenvファイルに保存して、値を参照してくる
                mapboxgl.accessToken = @json(env('MAPBOX_API_KEY'));
                const map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/streets-v11',
                    center: [138.4477649, 35.5042661],
                    zoom: 0.5
                });

                @php
                    // お気に入り登録用のURLの元となるURL準備
                    // %ID%としているのは、この時点ではcountry_idが分からないので、一旦%ID%とおいて
                    // 後でJSでこの%ID%を実際のcountryのidに置き換える用の一時保存用
                    // favoriteUrlBaseには「http://localhost/country/%ID%/favorite」の様な値が入る
                    $favoriteUrlBase = route('countries.favorites', '%ID%');
                @endphp

                // JSへ↑のURLの情報とcountryの情報を渡す
                const countries = @json($countries);
                const favoriteUrlBase = @json($favoriteUrlBase);

                map.on('load', () => {
                    // countryの件数分ループして、markerの登録に必要な情報を組み立てていく
                    const features = countries.map(counrty => {
                        return {
                            type: 'Feature',
                            geometry: {
                                type: 'Point',
                                coordinates: [counrty.lon, counrty.lat]
                            },
                            properties: {
                                title: counrty.name,
                                // ここの処理で、お気に入りボタンを押した時の実際のリクエストするURLを生成
                                favoriteUrl: favoriteUrlBase.replace('%ID%', counrty.id)
                            }
                        }
                    });

                    // 国ごとにmarkerの要素を作成し、地図に追加していく
                    for (const feature of features) {
                        new mapboxgl.Marker().setLngLat(feature.geometry.coordinates).setPopup(
                            new mapboxgl.Popup({
                                offset: 25
                            })
                            .setHTML(
                                `
                            <a href=${feature.properties.favoriteUrl}>
                                ${feature.properties.title}
                                <svg class='favorite' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                </svg>
                            </a>
                            `
                                // ↑は吹き出しの要素を作っている svgタグはハートマークを描画するための指定
                            )
                        ).addTo(map);
                    }
                });
            </script>


    </body>

    </html>
@endsection
