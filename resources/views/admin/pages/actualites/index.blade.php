@extends('admin.layout.app')
@section('content')
@include("shared.messages")


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModala">
        Ajouter une actualité
    </button>



    <!-- Modal -->
    <div class="modal fade" id="basicExampleModala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Création d'une actualité</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('admin.actualites.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <!-- Default input -->
                        <div class="form-group">
                            <label for="formGroupExampleInput">Titre</label>
                            <input type="text" id="formGroupExampleInput" name="titre"
                                class="form-control @if ($errors->get('titre')) border border-danger @endif">
                            @if ($errors->get('titre'))
                                <ul>
                                    @foreach ($errors->get('titre') as $error)
                                        <li style="color: red; margin-left: -25px"> {{ $error }}</li>
                                    @endforeach
                                </ul>

                            @endif
                        </div>
                        <!-- Default input -->
                        <label for="exampleForm2">Description</label>
                        <input type="text" name="description" id="exampleForm2"
                            class="form-control @if ($errors->get('description')) border border-danger @endif"><br>
                        @if ($errors->get('description'))
                            <ul>
                                @foreach ($errors->get('description') as $error)
                                    <li style="color:red; margin-left: -25px">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <!-- Default input -->
                        <div class="input-group @if ($errors->has('image')) border border-danger @endif">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Image</span>
                            </div>

                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input "
                                    aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01"></label>
                            </div>

                        </div>
                        @if ($errors->get('image'))
                            <ul>
                                @foreach ($errors->get('image') as $error)
                                    <li style="color:red; margin-left: -25px">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <table class="table dark-grey-text">
        <thead class="black white-text">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actualites as $actualite)
                <tr>
                    <th scope="row">{{ $actualite['id'] }}</th>
                    <td>{{ $actualite['titre'] }}</td>
                    <td>{{ substr($actualite['description'], 0, 50) }}</td>
                    <td><img src="{{asset('storage/'.$actualite['image'])}}" style="width: 100.0px" alt=""></td>
                    <td>
                        <!-- Button visualiser trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#modalRelatedContentv{{ $actualite['id'] }}">
                            <i class="fas fa-eye"></i>
                        </button>
                        <!-- Button editer trigger modal -->
                        <a type="button" href="{{url('/administrateur/actualites/'.$actualite['id'].'/edit')}}" class="btn btn-success btn-sm"  >
                            <i class="fas fa-edit"></i>
                        </a>
                        <!-- Button supprimer trigger modal -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#supprimer{{ $actualite['id'] }}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        <!-- Modal Visualiser-->
                        <!-- Modal -->

                        <div class="modal fade " id="modalRelatedContentv{{ $actualite['id'] }}" tabindex="-1"
                            role="document" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                            <div class="modal-dialog  modal-notify modal-info" role="document">

                                <!--Content-->
                                <div class="modal-content">
                                    <!--Header-->
                                    <div class="modal-header primary-color">
                                        <p class="heading" style="font-weight: bold">{{ $actualite['titre'] }}</p>

                                        <button type="button" class="close " data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true" class="white-text">&times;</span>
                                        </button>
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-5">
                                                <img src="{{asset('storage/'.$actualite['image'])}}" class="img-fluid" alt="">
                                            </div>

                                            <div class="col-7">
                                                <p>{{ $actualite['description'] }}</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                                <!--/.Content-->
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="edit{{ $actualite['id'] }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title editer</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                            <!-- Modal -->
                            <div class="modal fade" id="supprimer{{ $actualite['id'] }}" tabindex="-1" role="dialog"
                                aria-labelledby="supprimerModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: red">
                                            <h5 class="modal-title" id="supprimerModalLabel" style="color: white; font-weight:bold">Suppression de l'actualité n° {{$actualite['id']}}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="/administrateur/actualites/{{$actualite['id']}}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <div class="modal-body">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <p>Voulez-vous vraiment supprimer cette actualité ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"data-dismiss="modal">Close</button>
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
@push('scripts')
    <script type="text/javascript">
        @if (count($errors) > 0)
            $("#basicExampleModala").modal('show');
        @endif
    </script>
@endpush
