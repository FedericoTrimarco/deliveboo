<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="d-flex flex-column vh-100">
        <header>
            <nav class="d-flex justify-content-between align-items-center p-3">
                {{-- Left Side Of Navbar --}}
                <a class="site-link text-uppercase" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                {{-- Right Side Of Navbar --}}
                <div class="">
                    <ul class="d-flex m-0">
                        <!-- Authentication Links -->
                        @guest
                        <li class="pr-3">
                            <a class="site-link text-uppercase" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="pr-3">
                            <a class="site-link text-uppercase" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="dropdown pr-3 d-none d-md-block">
                            <a id="navbarDropdown" class="site-link text-uppercase dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right site-drpdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item site-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="d-md-none">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" data-display="static" aria-expanded="false">
                                Menu
                                </button>
                                <div class="dropdown-menu site-drpdown-menu" aria-labelledby="dropdownMenu">
                                    <a class="dropdown-item site-link @if (Request::route()->getName() == 'admin.home') active @endif" href="{{ route('admin.home') }}">
                                        Dashbord
                                    </a>
                                    <a class="dropdown-item site-link @if (Request::route()->getName() == 'admin.plates.index') active @endif" href="{{ route('admin.plates.index') }}">Plates</a>
                                    <a class="dropdown-item site-link" href="#">Orders</a>
                                    <div class="dropdown-divider"></div>
                                    <div>
                                        <a class="dropdown-item site-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>

        <main  class="d-flex flex-grow-1">
            @auth    
            <aside class="navbar navbar-expand-md flex-column p-0">
                <div class="site-aside collapse navbar-collapse navbarSupportedContent flex-column site-aside px-5">
                    <div class="d-flex flex-column align-items-center px-lg-5">
                        <a class="site-link text-uppercase p-1 mt-3 @if (Request::route()->getName() == 'admin.home') active @endif" href="{{ route('admin.home') }}">
                            Dashbord
                        </a>
                        <a class="site-link text-uppercase p-1 mt-3 @if (Request::route()->getName() == 'admin.plates.index') active @endif" href="{{ route('admin.plates.index') }}">Plates</a>
                        <a class="site-link text-uppercase p-1 mt-3" href="#">Orders</a>
                    </div>
                </div>
            </aside>
            @endauth
            <section class="flex-grow-1">
                @yield('content')
            </section>
        </main>
    </div>
</body>

</html>