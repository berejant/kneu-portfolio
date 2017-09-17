<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>

<nav class="main-navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Переключити навігацію</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">Портфоліо КНЕУ</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li>
                        <a @if($userPortfolioUrl=session('user.portfolio.url')) href="{{ $userPortfolioUrl }}" @endif >
                            <i class="user-icon"></i> Раді бачити, {{ session('user.name', 'шановний пане') }}!
                        </a>
                    </li>

                    <li><a href="#" class="logout-button">
                        <i class="logout-icon"></i> Вийти
                    </a></li>
                @else
                    <li><a href="{{ route('login') }}">
                        <i class="login-icon"></i> Увійти
                    </a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="container" id="app">

    <div class="clearfix"></div>
    @yield('content')

    <footer>
        © 2017 КНЕУ
        <div id="developer">Розробка: Володимир Гужва, Антон Бережний</div>
    </footer>
</div>


    <form id="logout-form" class="logout-form" action="{{ url('/logout') }}" method="POST">{{ csrf_field() }}</form>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>