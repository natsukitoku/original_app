<header>
    <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">tokunaga</a>
            <a href="{{route('mypage')}}">マイページ</a>
            <a href="{{route('follows.index')}}">友達</a>
            <a href="{{route('todos.index')}}">Todoリスト</a>
            <a href="{{route('tweets.index')}}">つぶやきページ</a>
        </div>
    </nav>
</header>
