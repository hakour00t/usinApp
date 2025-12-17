<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
   


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            
          


            {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">Features</a>
                <a class="nav-item nav-link" href="#">Pricing</a>
                <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </div>
            </div>
            </nav> --}}
                        
            
            <div class="container">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebare" aria-controls="sidebare">
                    menu
                </button>
              
                <a class="navbar-brand" href="{{ url('/') }}">
                    
                    {{ config('app.name', 'Laravel') }}
                    
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name ." " .Auth::user()->last_name   }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>




            
        {{-- sidebare --}}
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="sidebare" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    
                    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">les pages</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                     <ul class="nav flex-column p-4">
                        {{-- <li class="nav-item"><a href="#" class="nav-link">Dashboard</a></li> --}}
                        <li class="nav-item"><a href="{{ route('usersList') }}" class="nav-link">Utilisateur</a></li>
                        {{-- <li class="nav-item"><a href="{{ route('role.index') }}" class="nav-link">Liste des roles</a></li> --}}
                        {{-- <li class="nav-item"><a href="{{ route('permission.index') }}" class="nav-link">Liste des permissions</a></li> --}}
                        {{-- <li class="nav-item">
                             <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Coloraction
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('coloration.formullaire') }}">Charger le formullaire</a></li>
                                    <li><a class="dropdown-item" href="#">no action</a></li>
                                    <li><a class="dropdown-item" href="#">no action</a></li>>
                                </ul>
                        </li> --}}
                        {{-- <li class="nav-item"><a href="{{ route('bobines.index') }}" class="nav-link">Bobines nu</a></li> --}}
                        <li class="nav-item"><a href="{{ route('coloration.index') }}" class="nav-link">Coloration</a></li>
                        
                        {{-- <li class="nav-item"><a href="{{ route('coloration.fibreColori.index') }}" class="nav-link">Liste des Fibre Colorier</a></li> --}}
                        <li class="nav-item"><a href="{{ route('tube.index') }}" class="nav-link">Liste des Tubes Laches </a></li>


                          
                        <li class="nav-item"><a href="#" class="nav-link">Settings</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Logout</a></li>
                    </ul>
                </div>
            </div>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
