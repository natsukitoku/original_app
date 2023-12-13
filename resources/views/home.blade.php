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
        </style>
    </head>

    <body>
        <style>
            .mapboxgl-popup {
                max-width: 400px;
                font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
            }
        </style>
        <div class="container" style="margin: 20px">
            <h1>Hello! {{ $user->name }}さん!</h1>
            <h2>留学
                @if ($abroadingPlan)
                    @php
                        $from_date = $abroadingPlan->from_date;

                        $date = new DateTime($from_date);

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
            </h2>
        </div>
        <div id="map" style="height: 420px; margin-top: 192px"></div>
        <div style="margin-top: 480px">
            <h2>ワーホリ協定国一覧</h2>
            <table style="margin: 24px">
                <tr>
                    <th>国名</th>
                    <th>応募可能時期</th>
                    <th>年間発給数</th>
                </tr>
                @foreach ($countries as $country)
                    <tr>
                        <td>{{ $country->name }}</td>
                        <td>{{ $country->visa_information->applyterm }}</td>
                        <td>{{ $country->visa_information->people }}</td>
                        <td>
                            @if ($country->isFavoritedBy(Auth::user()))
                                <a href="{{ route('countries.favorites', $country) }}">
                                    <i class="fa fa-heart"></i>
                                    お気に入り解除
                                </a>
                            @else
                                <a href="{{ route('countries.favorites', $country) }}">
                                    <i class="fa fa-heart"></i>
                                    お気に入り
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach

                {{-- <ul>
            @foreach ($users as $user)
            <form action="{{route('follows.follow')}}" method="POST">
                @csrf
                <li>
                    <span>{{$user->name}}</span>
                    <input type="hidden" name="followee_id" value="{{$user->id}}">
                    <button type="submit">follow</button>
                </li>
            </form>
            @endforeach
        </ul> --}}


            </table>
        </div>
        <script>
            mapboxgl.accessToken =
                'pk.eyJ1IjoidG9rdW5hZ2FuYXRzdWtpIiwiYSI6ImNscGRqZmtndTA3bG0yam8wOWQzMndiZXEifQ.xAJjpKoHMgEGxBOuveFTvA';
            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [-77.04, 38.907],
                zoom: 11.15
            });

            map.on('load', () => {
                map.addSource('places', {
                    // This GeoJSON contains features that include an "icon"
                    // property. The value of the "icon" property corresponds
                    // to an image in the Mapbox Streets style's sprite.
                    'type': 'geojson',
                    'data': {
                        'type': 'FeatureCollection',
                        'features': [{
                                'type': 'Feature',
                                'properties': {
                                    'description': '<strong>Make it Mount Pleasant</strong><p><a href="http://www.mtpleasantdc.com/makeitmtpleasant" target="_blank" title="Opens in a new window">Make it Mount Pleasant</a> is a handmade and vintage market and afternoon of live entertainment and kids activities. 12:00-6:00 p.m.</p>',
                                    'icon': 'theatre-15'
                                },
                                'geometry': {
                                    'type': 'Point',
                                    'coordinates': [-77.038659, 38.931567]
                                }
                            },
                            {
                                'type': 'Feature',
                                'properties': {
                                    'description': '<strong>Mad Men Season Five Finale Watch Party</strong><p>Head to Lounge 201 (201 Massachusetts Avenue NE) Sunday for a <a href="http://madmens5finale.eventbrite.com/" target="_blank" title="Opens in a new window">Mad Men Season Five Finale Watch Party</a>, complete with 60s costume contest, Mad Men trivia, and retro food and drink. 8:00-11:00 p.m. $10 general admission, $20 admission and two hour open bar.</p>',
                                    'icon': 'theatre-15'
                                },
                                'geometry': {
                                    'type': 'Point',
                                    'coordinates': [-77.003168, 38.894651]
                                }
                            },
                            {
                                'type': 'Feature',
                                'properties': {
                                    'description': '<strong>Big Backyard Beach Bash and Wine Fest</strong><p>EatBar (2761 Washington Boulevard Arlington VA) is throwing a <a href="http://tallulaeatbar.ticketleap.com/2012beachblanket/" target="_blank" title="Opens in a new window">Big Backyard Beach Bash and Wine Fest</a> on Saturday, serving up conch fritters, fish tacos and crab sliders, and Red Apron hot dogs. 12:00-3:00 p.m. $25.grill hot dogs.</p>',
                                    'icon': 'bar-15'
                                },
                                'geometry': {
                                    'type': 'Point',
                                    'coordinates': [-77.090372, 38.881189]
                                }
                            },
                            {
                                'type': 'Feature',
                                'properties': {
                                    'description': '<strong>Ballston Arts & Crafts Market</strong><p>The <a href="http://ballstonarts-craftsmarket.blogspot.com/" target="_blank" title="Opens in a new window">Ballston Arts & Crafts Market</a> sets up shop next to the Ballston metro this Saturday for the first of five dates this summer. Nearly 35 artists and crafters will be on hand selling their wares. 10:00-4:00 p.m.</p>',
                                    'icon': 'art-gallery-15'
                                },
                                'geometry': {
                                    'type': 'Point',
                                    'coordinates': [-77.111561, 38.882342]
                                }
                            },
                            {
                                'type': 'Feature',
                                'properties': {
                                    'description': '<strong>Seersucker Bike Ride and Social</strong><p>Feeling dandy? Get fancy, grab your bike, and take part in this year\'s <a href="http://dandiesandquaintrelles.com/2012/04/the-seersucker-social-is-set-for-june-9th-save-the-date-and-start-planning-your-look/" target="_blank" title="Opens in a new window">Seersucker Social</a> bike ride from Dandies and Quaintrelles. After the ride enjoy a lawn party at Hillwood with jazz, cocktails, paper hat-making, and more. 11:00-7:00 p.m.</p>',
                                    'icon': 'bicycle-15'
                                },
                                'geometry': {
                                    'type': 'Point',
                                    'coordinates': [-77.052477, 38.943951]
                                }
                            },
                            {
                                'type': 'Feature',
                                'properties': {
                                    'description': '<strong>Capital Pride Parade</strong><p>The annual <a href="http://www.capitalpride.org/parade" target="_blank" title="Opens in a new window">Capital Pride Parade</a> makes its way through Dupont this Saturday. 4:30 p.m. Free.</p>',
                                    'icon': 'rocket-15'
                                },
                                'geometry': {
                                    'type': 'Point',
                                    'coordinates': [-77.043444, 38.909664]
                                }
                            },
                            {
                                'type': 'Feature',
                                'properties': {
                                    'description': '<strong>Muhsinah</strong><p>Jazz-influenced hip hop artist <a href="http://www.muhsinah.com" target="_blank" title="Opens in a new window">Muhsinah</a> plays the <a href="http://www.blackcatdc.com">Black Cat</a> (1811 14th Street NW) tonight with <a href="http://www.exitclov.com" target="_blank" title="Opens in a new window">Exit Clov</a> and <a href="http://godsilla.bandcamp.com" target="_blank" title="Opens in a new window">Gods’illa</a>. 9:00 p.m. $12.</p>',
                                    'icon': 'music-15'
                                },
                                'geometry': {
                                    'type': 'Point',
                                    'coordinates': [-77.031706, 38.914581]
                                }
                            },
                            {
                                'type': 'Feature',
                                'properties': {
                                    'description': '<strong>A Little Night Music</strong><p>The Arlington Players\' production of Stephen Sondheim\'s  <a href="http://www.thearlingtonplayers.org/drupal-6.20/node/4661/show" target="_blank" title="Opens in a new window"><em>A Little Night Music</em></a> comes to the Kogod Cradle at The Mead Center for American Theater (1101 6th Street SW) this weekend and next. 8:00 p.m.</p>',
                                    'icon': 'music-15'
                                },
                                'geometry': {
                                    'type': 'Point',
                                    'coordinates': [-77.020945, 38.878241]
                                }
                            },
                            {
                                'type': 'Feature',
                                'properties': {
                                    'description': '<strong>Truckeroo</strong><p><a href="http://www.truckeroodc.com/www/" target="_blank">Truckeroo</a> brings dozens of food trucks, live music, and games to half and M Street SE (across from Navy Yard Metro Station) today from 11:00 a.m. to 11:00 p.m.</p>',
                                    'icon': 'music-15'
                                },
                                'geometry': {
                                    'type': 'Point',
                                    'coordinates': [-77.007481, 38.876516]
                                }
                            }
                        ]
                    }
                });
                // Add a layer showing the places.
                map.addLayer({
                    'id': 'places',
                    'type': 'symbol',
                    'source': 'places',
                    'layout': {
                        'icon-image': '{icon}',
                        'icon-allow-overlap': true
                    }
                });

                // When a click event occurs on a feature in the places layer, open a popup at the
                // location of the feature, with description HTML from its properties.
                map.on('click', 'places', (e) => {
                    // Copy coordinates array.
                    const coordinates = e.features[0].geometry.coordinates.slice();
                    const description = e.features[0].properties.description;

                    // Ensure that if the map is zoomed out such that multiple
                    // copies of the feature are visible, the popup appears
                    // over the copy being pointed to.
                    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                    }

                    new mapboxgl.Popup()
                        .setLngLat(coordinates)
                        .setHTML(description)
                        .addTo(map);
                });

                // Change the cursor to a pointer when the mouse is over the places layer.
                map.on('mouseenter', 'places', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change it back to a pointer when it leaves.
                map.on('mouseleave', 'places', () => {
                    map.getCanvas().style.cursor = '';
                });
            });
        </script>

    </body>

    </html>
@endsection
