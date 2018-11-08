<!DOCTYPE html>
<html lang="{{ \App\Helpers\SettingHelper::setting('seo_language') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="{{ \App\Helpers\SettingHelper::setting('seo_keywords') }}">
    <meta name="description" content="{{ \App\Helpers\SettingHelper::setting('seo_description') }}">

    <title>@yield('title'){{ \App\Helpers\SettingHelper::setting('name') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        body{
            background-color:{{ \App\Helpers\SettingHelper::setting('bgcolour') }}
        }
        {{ \App\Helpers\Styling::loadCustomCSS() }}
    </style>

</head>
<body>

    <div id="app">

        <main class="mt-5">
            @yield('content')
        </main>

        <div class="container">
            <footer>
                Copyright &copy; {{ date("Y") }} {{ \App\Helpers\SettingHelper::setting('name') }} - All rights reserved.<br>
                <small class="font-weight-bold">Made using BinCMS <i class="mdi mdi-flower-tulip"></i></small>
            </footer>
        </div>

    </div>
</body>
</html>
