<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{URL::asset('mdb/css/bootstrap.min.css')}}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{URL::asset('mdb/css/mdb.min.css')}}">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{URL::asset('mdb/css/style.css')}}">



    <link rel="stylesheet" href="{{URL::asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{URL::asset('css/shared.css') }}">



    @yield("stylesheets")

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm" style="position: fixed; width: 100%;top: 0;z-index: 999;">
            <a class="navbar-brand" href="">
                <img src="{{ asset('images/logo.png') }}" class="card-img-top" alt="..." style="height:50px;width:50px">

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                            <a class="nav-link" href="/">Accueil</a>
                    </li>

                    <li class="nav-item">
                            <a class="nav-link" href="/actualites">Actualités</a>
                    </li>

                    <li class="nav-item">
                            <a class="nav-link" href="/offres">Offres d'emploi</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                </ul>
            </div>
          </nav>
<br><br><br>
          @yield('content')
<br><br><br>
          <footer class="site-footer">
            <div class="container">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <h6>les partenaires d'ABMFibre</h6>
                  <img src="{{ asset('images/logo.png') }}" class="card-img-top" alt="..." style="height:50px; width:50px; margin-bottom:5px;">
                  <img src="{{ asset('images/logo.png') }}" class="card-img-top" alt="..." style="height:50px; width:50px; margin-bottom:5px;">
                  <img src="{{ asset('images/logo.png') }}" class="card-img-top" alt="..." style="height:50px; width:50px; margin-bottom:5px;">
                  <img src="{{ asset('images/logo.png') }}" class="card-img-top" alt="..." style="height:50px; width:50px; margin-bottom:5px;">
                  <img src="{{ asset('images/logo.png') }}" class="card-img-top" alt="..." style="height:50px; width:50px; margin-bottom:5px;">
                  <img src="{{ asset('images/logo.png') }}" class="card-img-top" alt="..." style="height:50px; width:50px; margin-bottom:5px;">
                  <img src="{{ asset('images/logo.png') }}" class="card-img-top" alt="..." style="height:50px; width:50px; margin-bottom:5px;">
                  <img src="{{ asset('images/logo.png') }}" class="card-img-top" alt="..." style="height:50px; width:50px; margin-bottom:5px;">
                  </div>


                <div class="col-xs-6 col-md-3">
                  <h6 style="color:black">Categories</h6>

                </div>

                <div class="col-xs-6 col-md-3">
                  <h6>RUBRIQUES</h6>
                  <ul class="footer-links">
                    <li><a href="/">Accueil</a></li>
                    <li><a href="/actualites">Actualités</a></li>
                    <li><a href="/offres">Offres d'emploi</a></li>
                    <li><a href="/contact">Contacts</a></li>
                  </ul>
                </div>
              </div>
              <hr>
            </div>
            <div class="container">
              <div class="row">

                <div class="col-md-4 col-sm-6 col-xs-12" style="margin-left:270px">
                  <ul class="social-icons">
                    <li><a href="#" class="px-2 fa-lg li-ic"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#" class="px-2 fa-lg tw-ic"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" class="px-2 fa-lg fb-ic"><i class="fab fa-facebook-f"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
      </footer>
    </div>

    <!-- Scripts -->
    <!-- jQuery -->
    <script type="text/javascript" src="{{URL::asset('mdb/js/jquery.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{URL::asset('mdb/js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{URL::asset('mdb/js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{URL::asset('mdb/js/mdb.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('owl/js/owl.carousel.min.js')}}"></script>

    @stack('scripts')
</body>
</html>
