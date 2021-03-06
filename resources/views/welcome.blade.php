<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/app.js') }}"></script>
        <title>Laravel</title>

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

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                    @auth
                <script>window.location ="{{ url('home/2') }}";</script>
                    @else
                      <div class="content">
                          <div class="title m-b-md">
                            @lang('please login or register')
                            </div>
                            <div class="links">
                            <a href="{{ route('login') }}">@lang('Login')</a>
                            <a href="{{ route('register') }}">@lang('Register')</a>
                            <br><br>
                            <a href="/set/fr">@lang('French') </a>
                            <a href="/set/en">@lang('English')</a>
                            <a href="/set/jp">@lang('Japanese')</a>
                            </div>
                    @endauth
            @endif
        </div>
      </div>
    </body>
</html>
