<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Detecció de caigudes</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
            @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                    Detecció de caigudes
                </a>
            @else
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <strong>HOME - DASHBOARD</strong>
                </a>

            @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container-fluid">
            <main>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                          @auth

                              <div class="container">
                                <div class="row">
                                  <div class="btn-group  btn-group-lg " >
                                    <a role="button" class="btn btn-secondary" href="{{ route("user.index") }}">Users</a>
                                    <a role="button" class="btn btn-secondary" href="{{ route('horari.index') }}">Horari</a>
                                    <a role="button" class="btn btn-secondary" href="{{ route('sector.index') }}">Sector</a>
                                    <a role="button" class="btn btn-secondary" href="{{ route('devices.index') }}">Devices</a>
                                    <a role="button" class="btn btn-secondary" href="{{ route("clients.index") }}">Clients</a>

                                  </div>
                                </div>
                              </div>



                          @endauth
                            <div class="card-header"><h5><strong>@yield('title')</strong></h5></div>

                            <div class="card-body">


                            @yield('content')



                            </div>

                        </div>
                    </div>
                </div>



            </div>

            </main>

        </div>
    </div>
</body>
</html>
