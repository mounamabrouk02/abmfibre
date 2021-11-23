<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('mdb/css/bootstrap.min.css') }}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{ URL::asset('mdb/css/mdb.min.css') }}">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{ URL::asset('mdb/css/style.css') }}">




    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shared.css') }}">



    @yield("stylesheets")

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm"
            style="position: fixed; width: 100%;top: 0;z-index: 999;">
            <a class="navbar-brand" href="">
                <img src="{{ asset('images/logo.png') }}" class="card-img-top" alt="..."
                    style="height:50px;width:50px">

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.employe.index') }}">Employés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.service.index') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.chiffre.index') }}">Quelques chiffres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.actualites.index') }}">Actualités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.offre.index') }}">Offres d'emplois</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.candidature.index') }}">Candidatures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.contact.index') }}">Messages</a>
                    </li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn dropdown-toggle btn-lg" style="background-color: #212121;" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i style="color:white;" class="fas fa-user fa-2x"></i>
                </button>
                <div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">

                    <form action="{{route('admin.password.create')}}" method="get">
                        <button type="submit" class="dropdown-item">Paramètres</button>
                    </form>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Se déconnecter</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <br><br><br><br><br>
    <div class="container">
        @yield('content')
    </div>

    <!-- Scripts -->
    <!-- jQuery -->
    <script type="text/javascript" src="{{ URL::asset('mdb/js/jquery.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ URL::asset('mdb/js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ URL::asset('mdb/js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ URL::asset('mdb/js/mdb.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('owl/js/owl.carousel.min.js') }}"></script>


    @stack('scripts')


</body>

</html>
