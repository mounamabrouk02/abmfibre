@extends('admin.layout.app')
@section('content')
@include('shared.messages')



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModala">
  Ajouter un employé
</button>

<!-- Modal -->
<div class="modal fade" id="basicExampleModala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout d'un employé</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Default form group -->
        <form method="POST" action="{{route('admin.employe.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <!-- Default input -->
            <div class="form-group">
                <label for="formGroupExampleInput">Nom</label>
                <input type="text" class="form-control @if($errors->get('nom')) border border-danger @endif" name="nom" value="{{old('nom')}}"  id="formGroupExampleInput" placeholder="">
                @if ($errors->get('nom'))
                <ul>
                @foreach ($errors->get('nom') as $error )
                    <li style="color:red;  margin-left:-25px">{{$error}}
                    </li>
                @endforeach
                </ul>
                @endif
            </div>
            <!-- Default input -->
            <div class="form-group">
                <label for="formGroupExampleInput2">Prenom</label>
                <input type="text" value="{{old('prenom')}}" class="form-control @if($errors->get('prenom')) border border-danger @endif" name="prenom"  id="formGroupExampleInput1" placeholder="">
                @if (($errors)->get('prenom'))
                <ul>
                @foreach ($errors->get('prenom') as $error )
                    <li style="color:red;  margin-left:-25px">
                    {{$error}}
                    </li>
                @endforeach
                </ul>
                @endif
            </div>
            <!-- Default input -->
            <div class="form-group">
                <label for="formGroupExampleInput2">Poste</label>
                <input type="text" value="{{old('poste')}}" class="form-control @if($errors->get('poste')) border border-danger @endif" name="poste"  id="formGroupExampleInput1" placeholder="">
                @if (($errors)->get('poste'))
                <ul>
                @foreach ($errors->get('poste') as $error )
                    <li style="color:red;  margin-left:-25px">
                    {{$error}}
                    </li>
                @endforeach
                </ul>
                @endif
            </div>
            <!-- Default input -->
            <div class="form-group">
                <label for="formGroupExampleInput2">Téléphone</label>
                <input type="text" value="{{old('telephone')}}" class="form-control @if($errors->get('telephone')) border border-danger @endif" name="telephone"  id="formGroupExampleInput2" placeholder="">
                @if (($errors)->get('telephone'))
                <ul>
                @foreach ($errors->get('telephone') as $error )
                    <li style="color:red;  margin-left:-25px">
                    {{$error}}
                    </li>
                @endforeach
                </ul>
                @endif
            </div>
            <!-- Default input -->
            <div class="form-group">
                <label for="formGroupExampleInput2">Adresse email</label>
                <input type="text" value="{{old('email')}}" class="form-control @if($errors->get('email')) border border-danger @endif" name="email"  id="formGroupExampleInput3" placeholder="">
                @if (($errors)->get('email'))
                <ul>
                @foreach ($errors->get('email') as $error )
                    <li style="color:red; margin-left:-25px">
                    {{$error}}
                    </li>
                @endforeach
                </ul>
                @endif
            </div>
            <!-- Default input -->
            <div class="form-group">
                <label for="formGroupExampleInput2">Adresse</label>
                <input type="text" class="form-control @if($errors->get('adresse')) border border-danger @endif" name="adresse" value="{{old('adresse')}}" id="formGroupExampleInput4" placeholder="">
                @if (($errors)->get('adresse'))
                <ul>
                @foreach ($errors->get('adresse') as $error )
                    <li style="color:red;  margin-left:-25px">
                    {{$error}}
                    </li>
                @endforeach
                </ul>
                @endif
            </div>
            <div class="form-group @if ($errors->has('image')) border border-danger @endif">
                <label for="">Image</label>
                <input class="form-control" type="file" name="image">
            </div>
            @if($errors->has("image"))
            <ul>
                @foreach ($errors->get("image") as $error )
                 <li style="color:red; margin-left:-25px">
                    {{$error}}
                </li>
                @endforeach
            </ul>
            @endif
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
        <!-- Default form group -->
      </div>

    </div>
  </div>
</div>

<br><br><br>
<table class="table" id="datatable">
  <thead class="black white-text">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Poste</th>
      <th scope="col">Téléphone</th>
      <th scope="col">Email</th>
      <th scope="col">Adresse</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($employes as $employe )
    <tr>
      <th scope="row">{{$employe['id']}}</th>
      <td>{{substr($employe['nom'],0,9)}}</td>
      <td>{{$employe['prenom']}}</td>
      <td>{{$employe['poste']}}</td>
      <td>{{$employe['telephone']}}</td>
      <td>{{$employe['email']}}</td>
      <td>{{$employe['adresse']}}</td>
      <td>
            <!-- Button 1 Visualiser trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#show{{$employe['id']}}">
                <i class="fas fa-eye"></i>
            </button>
            <!-- Modal Visualiser-->
                 <!-- Modal -->

            <div class="modal fade"  id="show{{$employe['id']}}"  tabindex="-1" role="document"
            aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog  modal-notify modal-info modal-fluid" style="width: 600px" role="document">

              <!--Content-->
              <div class="modal-content">
                <!--Header-->
                <div class="modal-header primary-color">
                  <p class="heading" style="font-weight: bold">{{$employe['nom']}} {{$employe['prenom']}}</p>

                  <button type="button"  class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                  </button>
                </div>

                <!--Body-->
                <div class="modal-body">

                  <div class="row">
                    <div class="col-5">
                      <img src="{{asset('storage/'.$employe['image'])}}"
                        class="img-fluid" alt="">
                    </div>

                    <div class="col-7">
                        <table class="table table-borderless">
                            <h4><strong>{{$employe['poste']}}<strong></h4>
                                <tr>
                                    <td>
                                        <p style="color:#4285f4; font-weight: bold;">Téléphone </p>

                                    </td>
                                    <td>
                                        <p>{{$employe['telephone']}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="color:#4285f4; font-weight: bold;">Email</p>
                                    </td>
                                    <td>
                                        <p>{{$employe['email']}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="color:#4285f4; font-weight: bold;">Adresse</p>
                                    </td>
                                    <td>
                                        <p>{{$employe['adresse']}}</p>
                                    </td>
                                </tr>
                        </table>

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
            <!-- Button 2 Modifier trigger modal -->
             <a type="button" href="{{url('/administrateur/'.$employe['id'].'/edit')}}" class="btn btn-success btn-sm"  >
                <i class="fas fa-edit"></i>
             </a>
            <!-- Button 3 Supprimer trigger modal -->
             <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$employe['id']}}">
                <i class="fas fa-trash-alt"></i>
            </button>




                <!-- Modal Supprimer -->
                <div class="modal fade" id="delete{{$employe['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header" style="background-color: red">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: white; font-weight: bold">Supprimer l'employé n° {{$employe['id']}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>
                    <form action="/administrateur/{{$employe['id']}}" method="POST" id="deleteForm">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                    <div class="modal-body" >
                        <input type="hidden" name="_method" value="DELETE">
                        <p>Voulez-vous vraiment supprimer cet employé ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-danger">Confirmer</button>

                    </div>
                    </form>
                    </div>
                </div>
                </div>
            </td>
      @endforeach
    </tr>
  </tbody>
</table>
@endsection


@push('scripts')
    <script type="text/javascript">
        @if (count($errors) > 0)
            $("#basicExampleModala").modal('show');
        @endif
    </script>
   <!-- <script type="text/javascript">
       $(document).ready(function(){
           var table = $('#datatable').DataTable();

           //Start Edit record
           table.on('click', '.edit', function(){
               $tr= $(this).closes('tr');
               if($($tr)hasClass('child')){
                   $tr= $tr.prev('.parent');
               }
               var data = table.row($tr).data();
               console.log(data);
               $('nom').val(data[1]);
               $('prenom').val(data[2]);
               $('poste').val(data[3]);
               $('telephone').val(data[4]);
               $('email').val(data[5]);
               $('adresse').val(data[6]);

               $('#editForm').attr('action','/'+data[0]);
               $('#editModal').modal('show');
           });
       })

    </script>-->
@endpush
