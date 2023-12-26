<header class="m-5">
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top bg-warning-subtle">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 32px"><img class="logo"
                    src="{{ asset('img/logo.png') }}" alt="ワーホリンク"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('mypage') }}">マイページ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('follows.index') }}">友達</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('todos.index') }}">Todoリスト</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tweets.index') }}">つぶやきページ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
