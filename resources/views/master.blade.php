<!DOCTYPE html>
<html>
    <head>
        @yield('header')
        <!---<title>Jpak</title> -->
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/scripts/jquery-ui/jquery-ui.theme.min.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <link href="http://fonts.googleapis.com/css?family=Syncopate" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Pontano+Sans" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    </head>
    <body>
        <div id="container">
            <div id="head">
                <div id="div_logo">
                    <a href="index.html" id="div_site_title">ololol</a><br />
                    <a href="index.html" id="div_tag_line">ololol</a>
                </div>
                <nav class="nav-menu">
                    <ul id="main_menu">
                        <li><a {{ (Request::is('*/index') ? 'class=active' : '') }}
                                {{ (Request::is('/') ? 'class=active' : '') }} href="{{url("/")}}">Sākums</a></li>
                        <li><a {{ (Request::is('*legal') ? 'class=active' : '') }} href="{{url("/legal")}}">Juridiskie pakalpojumi</a></li>
                        <li><a {{ (Request::is('*project_managment') ? 'class=active' : '') }} href="{{url("/project_managment")}}">Projektu vadība</a></li>
                        <li><a {{ (Request::is('*question*') ? 'class=active' : '') }} href="{{url("/questions")}}">Jautājumi & atbildes</a></li>
                        <li><a {{ (Request::is('*contact_us') ? 'class=active' : '') }} href="{{url("/contact_us")}}">Kontakti</a></li>
                    </ul>
                </nav>
            </div>
            @yield('content')
            <div id="div_footer_separator"></div>
            <div id="div_footer">
                <p>Copyright © 2015 i-sitemas.lv all rights reserved.</p>
            </div>

        </div>
        <script src="{{ URL::asset('/scripts/jquery.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/scripts/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
        <?php if (Auth::check()) { ?>
            <script src="{{ URL::asset('/scripts/main.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('/scripts/questions.js') }}" type="text/javascript"></script>
        <?php } ?>
    </body>
</html>
