<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BU') }}</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('bufiles/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bufiles/plugins/datepicker3.css') }}">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'BU') }}
                </a>
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->firstname }} <span class="caret"></span>
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

        <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                    <!-- admin -->
                    @auth
                    
                    @if(Auth::user()->role->id == 1)
                    <div class="list-group">
                        <a href="{{ url('admin/roles') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-dice-two"></i> Roles
                        </a>
                        <a href="{{ url('admin/users') }}" class="list-group-item list-group-item-action"><i class="fas fa-user"></i> Usuarios</a>
                        <a href="{{ url('admin/activities') }}" class="list-group-item list-group-item-action"><i class="fas fa-briefcase"></i> Actividades</a>
                        <a href="{{ url('admin/periods') }}" class="list-group-item list-group-item-action"><i class="fas fa-calendar"></i> Periodos</a>
                        <a href="{{ url('admin/assignments') }}" class="list-group-item list-group-item-action"><i class="fas fa-clipboard"></i> Tareas</a>
                    </div>
                    <hr />
                    @endif
                    <!-- usuario -->
                    
                    <div id="list_user" class="list-group">
                        <a href="{{ url('tasks') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-clipboard"></i> Tareas
                        </a>
                        <a href="{{ url('requests') }}" class="list-group-item list-group-item-action"><i class="fas fa-hand-holding"></i> Solicitudes</a>
                        <a href="{{ url('reports') }}" class="list-group-item list-group-item-action"><i class="fas fa-file"></i> Reportes</a>
                    </div>
                    <hr />
                    @endauth
                </div>
            
                @yield('content')

                </div> <!-- End Row -->
                </div> <!-- End col-md-12 -->
            </div> <!-- End row justify-content-center -->
        </div> <!-- End Container -->
    
    </main>
    </div>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- Scripts Bootstrap-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- JS -->
    <script src="{{ asset('bufiles/js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bufiles/plugins/bootstrap-datepicker.js') }}"></script>
</body>
</html>