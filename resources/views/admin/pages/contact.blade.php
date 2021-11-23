@extends('admin.layout.app');
@section('content')
@include('shared.messages')
<table class="table">
    <thead class="black white-text">

        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom complet</th>
          <th scope="col">Email</th>
          <th scope="col">Objet</th>
          <th scope="col">Message</th>
          <th scope="col">Action</th>
        </tr>

    </thead>
    <tbody>
    @foreach ($contacts as $contact )
      <tr>
        <th scope="row">{{$contact['id']}}</th>
        <td>{{$contact['nomComplet']}}</td>
        <td>{{$contact['email']}}</td>
        <td>{{$contact['objet']}}</td>
        <td>{{$contact['message']}}</td>
        <td><!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#basicExampleModal{{$contact['id']}}">
                <i class="fas fa-eye"></i>
            </button>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$contact['id']}}">
                <i class="fas fa-trash-alt"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="basicExampleModal{{$contact['id']}}" tabindex="-1" role="document" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-notify modal-info" role="document">
                <div class="modal-content">
                  <div class="modal-header primary-color"  >
                    <h5 class="heading" style="font-weight: bold">Message n° {{$contact['id']}}</h5>
                    <button type="button" class="close" style="color: white" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <table class="table table-borderless">
                      <tr>
                          <td>
                            <p style="color:#4285f4; font-weight: bold;">Nom complet </p>
                          </td>
                          <td>
                            <p>{{$contact['nomComplet']}}</p>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <p style="color:#4285f4; font-weight: bold;">E-mail </p>
                          </td>
                          <td>
                              <p>{{$contact['email']}}</p>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <p style="color:#4285f4; font-weight: bold;">Objet</p>
                          </td>
                          <td>
                            <p>{{$contact['objet']}}</p>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <p style="color:#4285f4; font-weight: bold;">Message</p>
                          </td>
                          <td>
                              <p>{{$contact['message']}}</p>
                          </td>
                      </tr>
                    </table>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

                  </div>
                </div>
              </div>
            </div>


  <!-- Modal -->
  <div class="modal fade" id="delete{{$contact['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color:red">
          <h5 class="modal-title" id="exampleModalLabel" style="color: white; font-weight: bold;">Suppression du message n°{{$contact['id']}} </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
          </button>
        </div>
        <form action="/administrateur/contact/{{$contact['id']}}" method="POST">
            {{csrf_field()}}
            {{method_field('DELETE')}}
        <div class="modal-body">
            <input type="hidden" name="_method" value="DELETE">
          <p>Voulez vous vraiment supprimer ce message ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="SUBMIT" class="btn btn-danger">Confirmer</button>
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
