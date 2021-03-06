<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Anton');
        @import url('https://fonts.googleapis.com/css?family=Oswald');
        body {
            font-family: 'Lato';
            padding: 0;
            margin: 0;
        }

        .fa-btn {
            margin-right: 6px;
        }
        .navbarl{
            background: #fff;
            height: 100px;
        }
        .logo{
            position: relative;
            width: 20%;
            padding-top: 10px;
        }
        .letter{
            color: #39A8EA;
            font-family: 'Anton', sans-serif;
            font-size: 40px;
            position: relative;
            top: -75px;
            left: 25%;
        }
        .pa{
            color: #B7B7B7;
            font-family: 'Oswald', sans-serif;
            font-size: 18px;
            position: relative;
            top: -95px;
            left: 30%;
        }
        .loginletter{
            color: #B7B7B7;
            font-family: 'Oswald', sans-serif;
            top: 25px;
        }
        .navv{
            height: 120px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class=" navbar-default ">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <div class="navv">
                        <img class="logo" src="../Imagenes/Logo.png">
                        <p class="letter">LiciTop</p>
                        <p class="pa">Licitaciones privadas</p>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav nav-pills navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a class="loginletter" href="{{ url('/login') }}">Login</a></li>
                            <li><a class="loginletter" href="{{ url('/register') }}">Regitrarse</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a 
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="navar">
        	<div class="container">
        	    <ul class="nav nav-pills">
            		<li><a class="letternav" href="{{url ('/home')}}">Buscar</a></li>
            		<li><a href="{{url('/announcements')}}" class="letternav">Convocatorias</a></li>
                    <li><a href="{{url('/proposals')}}" class="letternav">Propuestas</a></li>
            		<li><a class="letternav" href="/proyects">Proyectos</a></li>
            		<li><a class="letternav" href="/corporation/team">Mi equipo</a></li>
            	</ul>
        	</div>
        </div>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
