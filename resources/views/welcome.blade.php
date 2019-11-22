<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
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

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .bg-red-gradient {
            background: #FA8072 !important;
            background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #FA8072), color-stop(1, #FFA07A)) !important;
            background: -ms-linear-gradient(bottom, #FA8072, #FFA07A) !important;
            background: -moz-linear-gradient(center bottom, #FA8072 0%, #FFA07A 100%) !important;
            background: -o-linear-gradient(#FFA07A, #FA8072) !important;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFA07A', endColorstr='#FA8072', GradientType=0) !important;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="bg-red-gradient">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ url('/addAnggota')}}">Register Anggota</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register Admin</a>
                @endif
                @endauth
            </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    Perpustakaan
                </div>
            </div>
        </div>
    </div>
</body>

</html>