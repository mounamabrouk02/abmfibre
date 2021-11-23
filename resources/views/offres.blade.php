@extends('layouts.app')
@section('stylesheets')
<style>
@media (max-width: 800px) {
    .offres{
        margin-left: 20px;

    }
}
</style>
@endsection
@section('content')<br>


    <h1 style="text-align: center">Les Offres d'emploi</h1><br><br>


    <div class="py-4 container" style=" display:block">

        @if (session()->has('success'))
            <div class="alert alert-success " style="margin-right: 20px; margin-left: -15px">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row">
            @foreach ($offres as $offre)
                <!-- Card -->
                <div class="card offres" style="background-image: url(https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg);margin-right:20px; width:540px; margin-bottom:20px;">
                    <!-- Content -->
                    <div class="card-body text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4" style="">
                        <div class="w-100">
                            <h5 class="pink-text"><i class="fas fa-chart-pie"></i> Offre d'emploi {{ $offre['id'] }}</h5>

                            <h3 class="card-title pt-2"><strong>{{ $offre['titre'] }}</strong></h3>
                            <small class="text-muted">{{ $offre['created_at'] }}</small><br><br>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#basicExampleModalv{{ $offre['id'] }}">
                                Voir plus
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#basicExampleModalp{{ $offre['id'] }}">
                                Postuler
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="basicExampleModalv{{ $offre['id'] }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"
                                                style="color:black; font-weight: bold;">{{ $offre['titre'] }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="color:rgb(97, 92, 92); text-align:justify;">
                                          <h5 style="color: #a6c">Description du poste</h5>
                                         <p>{{ $offre['description'] }}</p>
                                         <h5 style="color: #a6c">Profil recherché</h5>
                                         <p>{{ $offre['profil_recherche'] }}</p>
                                         <h5 style="color: #a6c">Missions</h5>

                                         <ul>
                                         @foreach ($offre->missions as $mission )
                                             <li>
                                                 {{$mission['contenu']}}
                                             </li>
                                         @endforeach
                                        </ul>
                                         <h5 style="color: #a6c">Type d'emploi</h5>
                                         <p>{{$offre['contrat']}}</p>
                                         <h5 style="color: #a6c">Salaire</h5>
                                         <p>{{$offre['salaire']}}</p>
                                         <h5 style="color: #a6c">Informations complémentaires</h5>
                                         <p>{{$offre['infocompl']}}</p>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="basicExampleModalp{{ $offre['id'] }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">

                                    <div class="modal-content">
                                        <div class="modal-header" style="text-align:center">
                                            <h5 class="modal-title" style="color:black; font-weight: bold;"
                                                id="exampleModalLabel">{{ $offre['titre'] }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <!-- -->

                                        <form action={{ route('candidature.store') }} method="post"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="offre" value="{{ $offre['id'] }}">
                                            <div class="modal-body">
                                                <!-- Material input -->
                                                <div class="md-form">
                                                    <i class="fas fa-user prefix"></i>
                                                    <input type="text" id="inputIconEx2" value="{{ old('nom') }}"
                                                        class="form-control @if ($errors->get('nom')) text invalid @endif" name="nom">
                                                    <label for="inputIconEx2">Nom</label>
                                                    @if ($errors->get('nom'))
                                                        <ul>
                                                            @foreach ($errors->get('nom') as $error)
                                                                <li style="color: red; text-align: left">
                                                                    {{ $error }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>

                                                <!-- Material input -->
                                                <div class="md-form">
                                                    <i class="fas fa-user prefix"></i>
                                                    <input type="text" id="inputIconEx2" value="{{ old('prenom') }}"
                                                        class="form-control @if ($errors->get('prenom')) invalid text @endif" name="prenom">
                                                    <label for="inputIconEx2">Prénom</label>
                                                    @if ($errors->get('prenom'))
                                                        <ul>
                                                            @foreach ($errors->get('prenom') as $error)
                                                                <li style="color: red; text-align: left">
                                                                    {{ $error }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif

                                                </div>

                                                <!-- Material input -->
                                                <div class="md-form">
                                                    <i class="fas fa-envelope prefix"></i>
                                                    <input type="text" id="inputIconEx1" value="{{ old('email') }}"
                                                        class="form-control @if ($errors->get('email')) invalid text @endif" name="email">
                                                    <label for="inputIconEx1">E-mail</label>
                                                    @if ($errors->get('email'))
                                                        <ul>
                                                            @foreach ($errors->get('email') as $error)
                                                                <li style="color: red; text-align: left">
                                                                    {{ $error }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                                <!-- Material input -->
                                                <div class="md-form">
                                                    <i class="fas fa-phone-alt prefix"></i>
                                                    <input type="text" id="inputIconEx1" value="{{ old('telephone') }}"
                                                        class="form-control @if ($errors->get('telephone')) invalid text @endif" name="telephone">
                                                    <label for="inputIconEx1">Téléphone</label>
                                                    @if ($errors->get('telephone'))
                                                        <ul>
                                                            @foreach ($errors->get('telephone') as $error)
                                                                <li style="color: red; text-align: left">
                                                                    {{ $error }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                                <!--Browse-->

                                                <div class="input-group @if ($errors->has('cv')) border border-danger @endif" >
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroupFileAddon01">CV</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input @if ($errors->get('cv')) invalid text @endif"
                                                            id="validatedCustomFile" name="cv" lang="fr">
                                                        <label class="custom-file-label" for="validatedCustomFile"></label>
                                                    </div>
                                                </div>
                                                @if ($errors->get('cv'))
                                                    <ul>
                                                        @foreach ($errors->get('cv') as $error)
                                                            <li style="color: red; text-align: left">
                                                                {{ $error }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                <br>
                                                <!--End Browse-->
                                                <!--Browse-->
                                                <div class="input-group @if ($errors->has('lettreMotivation')) border border-danger @endif">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text" id="inputGroupFileAddon01">Lettre de motivation</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input @if ($errors->get('lettreMotivation')) invalid text @endif"
                                                            id="validatedCustomFile" name="lettreMotivation" lang="fr" >
                                                        <label class="custom-file-label" for="validatedCustomFile"></label>
                                                    </div>
                                                </div>
                                                @if ($errors->get('lettreMotivation'))
                                                    <ul>
                                                        @foreach ($errors->get('lettreMotivation') as $error)
                                                            <li style="color: red; text-align: left">
                                                                {{ $error }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                <!--End Browse-->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Fermer</button>
                                                <button class="btn btn-primary" type="submit">Envoyer ma
                                                    candidature</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>

                            <!--End Modal -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        @if (count($errors) > 0)
            $('#basicExampleModalp{{ $offre['id'] }}').modal('show');
        @endif
    </script>
@endpush
