<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                padding-bottom: 20px;
            }

            .links {
                padding-bottom: 20px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .sources-title {
                padding-bottom: 20px;
                font-weight: 600;
                color: #bbb
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            hr {
                border-top: 1px solid #ccc;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Light Switch
                </div>

                <div class="links">
                    <a href="{{ url('/static/client.html') }}">HTML-only</a>
                    <a href="{{ url('/static/js-client.html') }}">JavaScript</a>
                    <a href="{{ url('/static/api-doc.html') }}">API Documentation</a>
                </div>
                <hr>
                <div class="sources-title">
                    SOURCES:
                </div>
                <div class="links">
                    <a href="https://github.com/ChandlerSwift/lightswitch-html">HTML/JS Clients</a>
                    <a href="https://github.com/ChandlerSwift/lightswitch-java">Java Client</a>
                    <a href="https://github.com/ChandlerSwift/lightswitch">Switch Firmware</a>
                    <a href="https://github.com/ChandlerSwift/lightproxy">This Web App</a>
                </div>
            </div>
        </div>
    </body>
</html>
