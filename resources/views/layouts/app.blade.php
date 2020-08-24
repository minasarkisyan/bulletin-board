<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <div class="container">
                    <a class="navbar-brand text-white" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <!-- Toggle button -->
                    <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarRightAlignExample"
                    aria-controls="navbarRightAlignExample"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Collapsible wrapper -->
                    <div class="collapse navbar-collapse" id="navbarRightAlignExample">
                    <!-- Left links -->

                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('admin.home') }}">Admin</a></li>
                                <li><a class="dropdown-item" href="{{ route('cabinet') }}">Cabinet</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endguest
                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->
                </div>
            </nav>
        </header>
        <main class="py-4 main_height">
            <div class="container">
                @section('breadcrumbs', Breadcrumbs::render())
                @yield('breadcrumbs')
                @include('layouts.partials.flash')
                @yield('content')
            </div>
        </main>
        <footer class="text-center text-lg-left">
            <div class="container">
                <div class="text-left p-3 border-top">
                    © {{ date('Y') }} Copyright:
                    <a class="text-dark" href="#">Advert dashboard</a>
                </div>
            </div>
        </footer>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
