@extends('admin.layout.app')
@section('content')
    @include('shared.messages')

    <form id="contact-form" name="contact-form" action="{{ url('/administrateur/offres/' . $offre['id']) }}"
        method="POST">
        <input type="hidden" name="_method" value='PUT'>
        {{ csrf_field() }}


        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-4">
                <!-- Default input -->
                <label for="exampleForm2">Titre</label>
                <input type="text" id="exampleForm2" name="titre" value="{{ $offre['titre'] }}" class="form-control">
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4">
                <!-- Default input -->
                <label for="exampleForm2">Contrat</label>
                <input type="text" id="exampleForm2" name="contrat" value="{{ $offre['contrat'] }}" class="form-control">
            </div>
            <!--Grid column-->
            <div class="col-md-4">
                <!-- Default input -->
                <label for="exampleForm2">Salaire</label>
                <input type="text" id="exampleForm2" name="salaire" value="{{ $offre['salaire'] }}" class="form-control">
            </div>
        </div>

        <!--Grid row-->
        <div class="row">
            <div class="col-md-4">
                <!--Material textarea-->
                <label for="form75">Description</label>
                <textarea id="form75" name="description" class="md-textarea form-control"
                    rows="3">{{ $offre['description'] }}</textarea>
            </div>
            <div class="col-md-4">
                <!--Material textarea-->
                <label for="form75">Profil recherché</label>
                <textarea id="form75" name="profil_recherche" class="md-textarea form-control"
                    rows="3">{{ $offre['profil_recherche'] }}</textarea>
            </div>
            <div class="col-md-4">
                <!--Material textarea-->
                <label for="form75">Informations complémentaires</label>
                <textarea id="form75" name="infocompl" class="md-textarea form-control"
                    rows="3">{{ $offre['infocompl'] }}</textarea>
            </div>
        </div>

        <!--Grid row-->
        <div class="row">
            @for ($i = 0; $i <= 2; $i++)
                <div class="col-md-4">
                    <!-- Default input -->
                    <label for="exampleForm2">Mission {{ $i + 1 }}</label>
                    <input type="text" id="exampleForm2" name="contenu{{ $i + 1 }}"
                        value="{{ $offre['missions'][$i]->contenu }}" class="form-control">
                </div>
            @endfor
        </div>
        <!--Grid row-->
        <div class="row">
            @for ($i = 3; $i <= 5; $i++)
                @if (isset($offre['missions'][$i]))
                    <div class="col-md-4">
                        <!-- Default input -->
                        <label for="exampleForm2">Mission {{ $i + 1 }}</label>
                        <input type="text" id="exampleForm2" name="contenu{{ $i + 1 }}"
                            value="{{ $offre['missions'][$i]->contenu }}" class="form-control">
                    </div>
                @endif
            @endfor
        </div>
        <!--Grid row-->

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>

@endsection
