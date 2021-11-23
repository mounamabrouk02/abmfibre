@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="{{ URL::asset('owl/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('owl/css/owl.theme.default.css') }}">
    <style>
        .flex-container {
  display: flex;
  flex-direction: row;
  }
    @media (max-width: 800px) {
      .flex-container {
        flex-direction: column;
        justify-content: center;
      }
      .chiffre{
          margin-left: 20px;
      }
    }
    </style>
@endsection

@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            @foreach ($topList as $element)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <img src="{{ $element['image'] }}" class="d-block w-100" alt="..." height="500px">
                    <div style="background: hsla(0, 0%, 13%, 0.78);" class="carousel-caption d-none d-md-block">
                        <h5>{{ $element['titre'] }}</h5>
                        <p>{{ $element['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!------------------------------------------------------------------------------------------------>
    <!-- content -->

    <br><br><br>

    <div class="container">
        @foreach ($descriptions as $description)
            <div class="card mb-3" style="max-width: 1200px; height: 400px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src={{ $description['image'] }} alt="..." class="img-fluid" style="height: 400px;" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">

                            <h1 class="card-title">{{ $description['titre'] }}</h1>
                            <p class="card-text">{{ $description['contenu'] }}</p>

                            <br><br>

                            <p class="card-text">
                                <small class="text-muted">Ajouté le {{ $description['created_at'] }}</small>
                            </p>

                        </div>
                    </div>
                </div>
        @endforeach
    </div>
    <!----------------------------------------------------------------------------------->
    <br><br><br>

    <h1 style="text-align: center;"> Les services d'ABMFibre</h1>
    <br>
    <div class="row ">
        <div class="owl-carousel owl-theme w-100">
            @foreach ($cartes as $carte)
                <div class="item p-2" style="height:400px">
                    <div class="card h-100">
                        <img src="{{asset('storage/'.$carte['image'])}}" class="card-img-top" alt="..." style="height: 196px" />
                        <div class="card-body">
                            <h5 class="">{{ $carte['titre'] }}</h5>
                                <p class=" card-text">
                                    {{ $carte['contenu'] }}
                                </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Ajouté le {{ $carte['created_at'] }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div><br>
    <div class="d-flex justify-content-center">
        <div>
            <button id="btn-previous-element" class="btn btn-ouline-secondary"><i class="fas fa-angle-left fa-2x"></i></button>
            <button id="btn-next-element" class="btn btn-ouline-secondary"><i class="fas fa-angle-right fa-2x"></i></button>
        </div>
    </div>



    <br><br><br>
    <!-- cards -->
    <h1 class="text-center">ABM Fibre en quelques chiffres</h1>
    <br><br>
    <div class="flex-container">

        @foreach ($chiffres as $chiffre)

            <div class="card chiffre" style="flex: 100%; text-align: center; margin-right: 20px; margin-bottom:30px">
                <div class="card-body;" style="padding: 20px">
                    <h5 class="card-title " style="text-align: center; font-weight: bold;">{{ $chiffre['titre'] }}
                    </h5>
                    <p class="card-text">
                        {{ $chiffre['contenu'] }}
                    </p>
                    <i class="{{ $chiffre['icon'] }} fa-5x"></i>

                </div>
            </div>

        @endforeach
    </div>
    </div>
    <br><br><br>

@endsection


@push('scripts')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            width: 300,

        })
        const owl = $('.owl-carousel');

        $('#btn-next-element').click(function() {
            owl.trigger('next.owl.carousel');
        })
        $('#btn-previous-element').click(function() {
            owl.trigger('prev.owl.carousel');
        })
    </script>
@endpush
