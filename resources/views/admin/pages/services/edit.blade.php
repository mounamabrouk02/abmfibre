@extends('admin.layout.app')
@section('content')
<h1> Modification du service {{$service['id']}}</h1>
<form method="POST" action="{{url('/administrateur/services/'.$service['id'])}}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value='PUT'>
    {{csrf_field()}}

    <!-- Default input -->
    <label for="exampleForm2">Titre</label>
    <input type="text" id="exampleForm2" name="titre" value="{{$service['titre']}}" class="form-control">
    @if ($errors->get('titre'))
    <ul>
        @foreach ($errors->get('titre') as $error)
            <li style="color: red; margin-left:-25px">{{$error}}</li>
        @endforeach
    </ul>
    @endif

    <label for="exampleForm2">Contenu</label>
    <input type="text" id="exampleForm2" name="contenu" value="{{$service['contenu']}}" class="form-control">
    @if (($errors)->get('contenu'))
    <ul>
        @foreach ($errors->get('contenu') as $error)
            <li style="color: red; margin-left:-25px">{{$error}}</li>
        @endforeach
    </ul>
    @endif
        <br>
    <div class="input-group @if ($errors->has('image')) border border-danger @endif">
        <div class="input-group-prepend" >
            <span class="input-group-text" id="inputGroupFileAddon01">Image</span>
        </div>
        <div class="custom-file">
          <input type="file" name="image" class="custom-file-input"  id="inputGroupFile01" lang="fr"
            aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label"  for="inputGroupFile01" >Séléctionner une image</label>
        </div>
    </div>
        @if(($errors)->get('image'))
        <ul>
        @foreach ($errors->get('image') as $error )
            <li style="color: red; margin-left:-25px">{{$error}}</li>
        @endforeach
        </ul>
        @endif
    <div class="modal-footer">

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
</form>
@endsection

