@extends('layouts.app')

@section('stylesheets')
<link rel="stylesheet" href="css/contact.css">
@endsection

@section('content')


<!-- Section: Contact v.1 -->
<div class="container">
<section class="my-5">

    <!-- Section heading -->
    <h2 class="h1-responsive font-weight-bold text-center my-5"></h2>
    <!-- Section description -->

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-lg-5 mb-lg-0 mb-4">

        <!-- Form with header -->
        <div class="card">
            <form action="{{ url('contact') }}" method="post">
                {{csrf_field()}}
                <div class="card-body">
                  <!-- Header -->
                  <div class="form-header blue accent-1">
                    <h3 class="mt-2"><i class="fas fa-envelope"></i> Contactez-nous</h3>
                  </div>

                  @if (session()->has("success"))
                   <div class="alert alert-success">
                    {{session()->get("success")}}
                  </div>
                  @endif


                  <!-- Body -->
                  <div class="md-form">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" id="form-name" value="{{old('nomComplet')}}" class="form-control @if ($errors->get('nomComplet')) invalid text @endif"  name="nomComplet">
                    <label for="form-name">Nom complet</label>

                    @if ($errors->get('nomComplet'))
                        @foreach ($errors->get('nomComplet') as $error )
                           <p style="color: red; margin-left:45px" >{{$error}}</p>
                        @endforeach
                    @endif
                  </div>
                  <div class="md-form">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="text" id="form-email" value="{{old('email')}}" class="form-control @if($errors->get('email')) invalid text @endif" name="email">
                    <label for="form-email">E-mail</label>

                    @if ($errors->get('email'))
                        @foreach ($errors->get('email') as $error )
                            <p style="color: red; margin-left:45px">{{$error}}</p>
                        @endforeach
                    @endif
                  </div>
                  <div class="md-form">
                    <i class="fas fa-tag prefix grey-text"></i>
                    <input type="text" id="form-Subject" value="{{old('objet')}}" class="form-control @if($errors->get('objet')) invalid text @endif"  name="objet" >
                    <label for="form-Subject">Objet</label>

                    @if ($errors->get('objet'))
                        @foreach ($errors->get('objet') as $error)
                            <p style="color: red; margin-left:45px" >{{$error}}</p>
                        @endforeach
                    @endif

                  </div>
                  <div class="md-form">
                    <i class="fas fa-pencil-alt prefix grey-text"></i>
                    <textarea id="form-text" class="form-control md-textarea @if ($errors->get('message')) invalid text @endif"  name="message" rows="3">{{old('message')}}</textarea>
                    <label for="form-text">Message</label>

                    @if ($errors->get('message'))
                        @foreach ($errors->get('message') as $error )
                            <p style="color: red; margin-left:45px" >{{$error}}</p>
                        @endforeach
                    @endif

                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-light-blue">Envoyer</button>
                  </div>
                </div>
              </div>
              <!-- Form with header -->

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-7">

              <!--Google map-->
              <div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: 400px">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2894.2909158159446!2d-1.5407374847293522!3d43.49626637058284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd516a94ed215af5%3A0x46fbca29797cb517!2s1%20Pl.%20de%20la%20Chapelle%2C%2064600%20Anglet!5e0!3m2!1sfr!2sfr!4v1631825663147!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
              <!-- Buttons-->
              <div class="row text-center">
                <div class="col-md-4">
                  <a class="btn-floating blue accent-1">
                    <i class="fas fa-map-marker-alt"></i>
                  </a>

                  <p class="mb-md-0">Anglet</p>
                </div>
                <div class="col-md-4">
                  <a class="btn-floating blue accent-1">
                    <i class="fas fa-phone"></i>
                  </a>

                  <p class="mb-md-0">Lun - Ven, 8:00-18:00</p>
                </div>
                <div class="col-md-4">
                  <a class="btn-floating blue accent-1">
                    <i class="fas fa-envelope"></i>
                  </a>

                  <p class="mb-0">abm.fibre@orange.fr</p>
                </div>
          </form>
        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </section>
</div>
  <!-- Section: Contact v.1 -->
@endsection
