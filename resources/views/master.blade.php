<!DOCTYPE html>
<html>
    <head>
        @yield('header')
        <!---<title>Jpak</title> -->
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://fonts.googleapis.com/css?family=Syncopate" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Pontano+Sans" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    </head>
    <body>
        <div id="container">
            <div id="head">
                <div id="div_logo">
                    <a href="index.html" id="div_site_title">Annas Berzas</a><br />
                    <a href="index.html" id="div_tag_line">tiešsaistes birojs</a>
                </div>
                <nav class="nav-menu">
                    <ul id="main_menu">
                        <li><a href="#">Sākums</a></li>
                        <li><a href="#">Juridiskie pakalpojumi</a></li>
                        <li><a href="#">Projektu vadība</a></li>
                        <li><a href="#">Jautājumi & atbildes</a></li>
                        <li><a href="#">Kontakti</a></li>
                    </ul>
                </nav>
            </div>
            @yield('content')
            <div id="div_footer_separator"></div>
            <div id="div_footer">
                Copyright © 2015 i-sitemas.lv all rights reserved.
            </div>
        </div>
        <script src="{{ URL::asset('/scripts/main.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/scripts/jquery.js') }}" type="text/javascript"></script>
    </body>
</html>
