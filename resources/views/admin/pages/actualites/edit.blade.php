@extends('admin.layout.app')
@section('content')
@include('shared.messages')

<h2>Modification de l'actualité {{$actualite['id']}}</h1>

<form action="{{url('/administrateur/actualites/'.$actualite['id'])}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_method" value='PUT'>
    {{ csrf_field() }}

    <!-- Default input -->
    <div class="form-group">
        <label for="formGroupExampleInput">Titre</label>
        <input type="text" id="formGroupExampleInput" name="titre" value="{{$actualite['titre']}}"
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
    <input type="text" name="description" id="exampleForm2" value="{{$actualite['description']}}"
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
        <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
</form>
@endsection
