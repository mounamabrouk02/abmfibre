@extends('admin.layout.app')
@section('content')
@include('shared.messages')
<h2>Modification de l'employé {{$employe['nom']}} {{$employe['prenom']}}</h1>

<form method="POST" action="{{url('/administrateur/'.$employe['id'])}}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value='PUT'>
    {{csrf_field()}}

    <!-- Default input -->
    <div class="form-group">
        <label for="formGroupExampleInput">Nom</label>
        <input type="text" class="form-control @if($errors->get('nom')) border border-danger @endif" name="nom" value="{{$employe['nom']}}"  id="formGroupExampleInput" placeholder="">
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
        <input type="text" value="{{$employe['prenom']}}" class="form-control @if($errors->get('prenom')) border border-danger @endif" name="prenom"  id="formGroupExampleInput1" placeholder="">
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
        <input type="text" value="{{$employe['poste']}}" class="form-control @if($errors->get('poste')) border border-danger @endif" name="poste"  id="formGroupExampleInput1" placeholder="">
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
        <input type="text" value="{{$employe['telephone']}}" class="form-control @if($errors->get('telephone')) border border-danger @endif" name="telephone"  id="formGroupExampleInput2" placeholder="">
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
        <input type="text" value="{{$employe['email']}}" class="form-control @if($errors->get('email')) border border-danger @endif" name="email"  id="formGroupExampleInput3" placeholder="">
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
        <input type="text" class="form-control @if($errors->get('adresse')) border border-danger @endif" name="adresse" value="{{$employe['adresse']}}" id="formGroupExampleInput4" placeholder="">
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
        <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
</form>

@endsection


