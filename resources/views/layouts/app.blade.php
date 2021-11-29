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

        * {
            box-sizing: border-box;
        }

        #app {
            display: flex;
            flex-direction: column;
        }

        .header__title {
            text-decoration: none;
        }

        .main {
            display: flex;
            justify-content: space-around;
            background-color: #fffeec;
            height: 100vh;
            align-content: center;
        }

        .auth {
            flex-grow: 1;
        }

        .auth__container {
            width: 80%;
            display: flex;
            flex-direction: column;
            border: 2px solid #636b6f;
            padding: 1rem;
            margin: 1rem;
        }

        .auth__title {
            font-size: 1.2em;
            color: #86cecb;
        }

        .main_container {
            display: flex;
            border: 2px solid #636b6f;
            padding: 1rem;
            flex-wrap: wrap;
            flex-grow: 5;
            margin: 1rem;
        }

        .contents_list {
            display: flex;
            list-style: none;
            padding-left: 0;
            margin: 1rem;

        }

        .contents_container {
            border: 1px solid lightgray;
            width: 30%;
            height: 50vh;
            margin-right: 1rem;
        }

        .contents {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .thumbnail {
            width: 100%;
            height: 80%;
        }

        .contents_title,
        .user_name {
            margin: 0;
            padding-top: 0.5rem;
            text-decoration: none;
        }
    </style>

</head>

<body>
    <div id="app">
        <header class="header">
            <h1>
                <a class="header__title" href="{{ url('/') }}">
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