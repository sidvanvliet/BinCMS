<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    @yield('styles')
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.3/aos.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark" style="z-index:945238">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }} <span class="highlight">Admin</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin dashboard</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="menu-items-wrap">
            <div class="row container-fluid text-center" id="menu-items" data-aos="fade-down" data-aos-duration="600">

                <a href="{{ Route('admin.dashboard') }}" class="col nav2-item {{ Request::is('admin/dashboard') ? 'nav2-selected' : '' }}">
                    <i class="mdi mdi-playlist-edit"></i>
                    Portfolio
                </a>

                <a href="{{ Route('admin.seo') }}" class="col nav2-item {{ Request::is('admin/seo') ? 'nav2-selected' : '' }}">
                    <i class="mdi mdi-google-circles-extended"></i>
                    SEO
                </a>

                <a href="{{ Route('admin.settings') }}" class="col nav2-item {{ Request::is('admin/settings') ? 'nav2-selected' : '' }}">
                    <i class="mdi mdi-lightbulb-on-outline"></i>
                    Settings
                </a>

                <a href="{{ Route('admin.styling') }}" class="col nav2-item {{ Request::is('admin/styling') ? 'nav2-selected' : '' }}">
                    <i class="mdi mdi-auto-fix"></i>
                    Custom styling
                </a>

                <a href="{{ Route('home') }}" class="col nav2-item {{ Request::is('admin/') ? 'nav2-selected' : '' }}">
                    <i class="mdi mdi-export"></i>
                    Visit website
                </a>

            </div>
        </div>

        <main class="container py-4 mt-5">
            @yield('content')
        </main>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.3/aos.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script>AOS.init();</script>

        @yield('scripts')

    </div>
</body>
</html>
