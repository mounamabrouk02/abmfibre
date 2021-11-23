@extends('admin.layout.app')
@section('content')
    @include("shared.messages")
    <table class="table">
        <thead class="black white-text">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Offre</th>
                <th scope="col">Nom</th>
                <!--<th scope="col">Prénom</th>-->
                <th scope="col">E-mail</th>
                <!--<th scope="col">Téléphone</th>-->
                <th scope="col">Etat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidatures as $candidature)
                <tr>
                    <th scope="row">{{ $candidature['id'] }}</th>
                    <th scope="row">{{ $candidature['offres']['titre'] }}</th>
                    <td>{{ $candidature['nom'] }}</td>
                    <!-- <td>{{ $candidature['prenom'] }}</td></td>-->
                    <td>{{ $candidature['email'] }}</td>
                    <!-- <td>{{ $candidature['telephone'] }}</td>-->
                    <td>{{$candidature['etat']}}</td>

                    <td>
                        <!-- Button accepter candidature trigger modal -->
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#acceptedcand{{$candidature['id']}}">
                            <i class="fas fa-check-circle"></i>
                        </button>
                        <!-- Button refuser candidature trigger modal -->
                        <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                            data-target="#refusalcand{{$candidature['id']}}">
                            <i class="fas fa-times-circle"></i>
                        </button>

                        <!-- Button 1 Visualiser trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#basicExampleModal{{ $candidature['id'] }}">
                            <i class="fas fa-eye"></i>
                        </button>

                        <!-- Button 2 Supprimer trigger modal -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#delete{{$candidature['id']}}">
                            <i class="fas fa-trash-alt"></i>
                        </button>


                        <!--
                        modal candidature acceptée
                        -->


                            <!-- Modal -->
                            <div class="modal fade" id="acceptedcand{{$candidature['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #00c851">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Candidature de {{$candidature['nom']}}{{$candidature['prenom']}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-white">&times;</span>
                                    </button>
                                    </div>
                                    <form method="POST" action="{{ route('admin.candidature.sendAcceptMail', ['candidature' => $candidature['id']]) }}">
                                        @csrf
                                    <div class="modal-body">
                                    <p>Etes vous sûr de vouloir accepter cette candidature ?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-success">Accepter la candidature</button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        <!--
                        fin modal
                        -->

                            <!-- Modal refuser-->
                            <div class="modal fade" id="refusalcand{{$candidature['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #212529">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Candidature de {{$candidature['nom']}}{{$candidature['prenom']}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-white">&times;</span>
                                    </button>
                                    </div>
                                    <form method="POST" action="{{ route('admin.candidature.sendRefusalMail', ['candidature' => $candidature['id']]) }}">
                                        @csrf
                                    <div class="modal-body">
                                    <p>Etes vous sûr de vouloir refuser cette candidature ?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-success">Refuser la candidature</button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        <!--
                        fin modal
                        -->


                        <!-- Modal -->
                        <div class="modal fade" id="basicExampleModal{{ $candidature['id'] }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-notify modal-info" role="document">
                                <div class="modal-content">
                                    <div class="modal-header primary-color">
                                        <h5 class="heading" style="font-weight: bold">
                                            {{ $candidature['offres']['titre'] }}</h5>
                                        <button type="button" class="close" style="color: white"
                                            data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <table class="table table-borderless">
                                            <tr>
                                                <td>
                                                    <p style="color:#0062cc; font-weight:bold;"> Nom </p>
                                                </td>
                                                <td>
                                                    <p>{{ $candidature['nom'] }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p style="color:#0062cc ; font-weight:bold;">Prénom </p>
                                                </td>
                                                <td>
                                                    <p>{{ $candidature['prenom'] }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p style="color:#0062cc; font-weight:bold;">Email </p>
                                                </td>
                                                <td>
                                                    <p>{{ $candidature['email'] }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p style="color:#0062cc ; font-weight:bold;"> Téléphone </p>
                                                </td>
                                                <td>
                                                    <p>{{ $candidature['telephone'] }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p style="color:#0062cc ; font-weight:bold;"> CV </p>
                                                </td>
                                                <td>
                                                    <a type="button"
                                                    target="_blank"
                                                    href="{{route("pdf:view",["id"=>$candidature['id']])}}"
                                                        class="btn btn-outline-default btn-rounded waves-effect btn-sm"><i
                                                            style="color:#2bbbad" class="fas fa-eye"></i></button>
                                                    <a type="button" href='{{route("pdf:download",["id"=>$candidature['id']])}}'
                                                        class="btn btn-outline-secondary btn-rounded waves-effect btn-sm ml-1"><i
                                                            style="color:#a6c " class="fas fa-download"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p style="color: #0062cc; font-weight: bold; ;">Lettre de motivation
                                                    </p>
                                                </td>
                                                <td>
                                                    <a type="button"
                                                        class="btn btn-outline-default btn-rounded waves-effect btn-sm"><i
                                                            style="color:#2bbbad" class="fas fa-eye"></i></button>
                                                    <a type="button"
                                                        class="btn btn-outline-secondary btn-rounded waves-effect btn-sm ml-1"><i
                                                            style="color:#a6c " class="fas fa-download"></i></button>
                                                </td>
                                            </tr>
                                        </table>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Modal Supprimer-->
                        <div class="modal fade" id="delete{{$candidature['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: red">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: white; font-weight:bold">Suppression de la candidature n°{{$candidature['id']}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-white">&times;</span>
                                </button>
                                </div>
                                <form action="/administrateur/candidature/{{$candidature['id']}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                <div class="modal-body">
                                <input type="hidden" name="_method" value="DELETE">
                                <p>Voulez-vous vraiment supprimer cette candidature</p>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Confirmer</button>
                                </div>
                            </form>
                            </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>




@endsection
