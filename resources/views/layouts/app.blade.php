<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>minto</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #86cecb;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        #app {
            display: flex;
            flex-direction: column;
        }

        .main {
            display: flex;
            justify-content: space-around;
            background-color: #fffeec;
            height: 100vh;
        }

        .auth__container {
            display: flex;
            flex-direction: column;
            border: 2px solid #636b6f;
            padding: 1em;
            margin-top: 1rem;
        }

        .auth__title {
            font-size: 1.2em;
            color: #86cecb;
        }
    </style>

</head>

<body>
    <div id="app">
        <header class="header">
            <h1>
                <a class="navbar-brand" href="{{ url('/') }}">
                    Minto
                </a>
            </h1>
        </header>

        <main class="main">
            @yield('main')
        </main>
    </div>
</body>

</html>