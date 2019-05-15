<html>
<head>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Пивоварня v 1.0 - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
</head>
<body>

<div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
    <div class="container">
        <a href="../" class="navbar-brand">Моя пивоварня</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="http://blog.bootswatch.com">Рецепты</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../help/">Температурные паузы</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link">Кипячение</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link">Охлаждение</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="http://blog.bootswatch.com">Проверка узлов</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download">Slate <span class="caret"></span></a>
                    <div class="dropdown-menu" aria-labelledby="download">
                        <a class="dropdown-item" target="_blank" href="https://jsfiddle.net/bootswatch/g1q7jxzf/">Open in JSFiddle</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../4/slate/bootstrap.min.css" download>bootstrap.min.css</a>
                        <a class="dropdown-item" href="../4/slate/bootstrap.css" download>bootstrap.css</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../4/slate/_variables.scss" download>_variables.scss</a>
                        <a class="dropdown-item" href="../4/slate/_bootswatch.scss" download>_bootswatch.scss</a>
                    </div>
                </li>
            </ul>

            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="https://wrapbootstrap.com/?ref=bsw" target="_blank">Старт/Стоп</a>
                </li>
            </ul>

        </div>
    </div>
</div>


<div class="container">
    <div class="page-header" id="banner" style="padding-top: 100px">
        <div class="row">
            <div>
                @yield('content')
            </div>
        </div>
    </div>

</div>

<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}?random=<?php echo uniqid(); ?>"></script>

</body>
</html>
