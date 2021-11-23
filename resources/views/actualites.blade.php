@extends('layouts.app')

@section('content')
<style>
@media (max-width: 800px) {
    .actu{
        width: 150px;
    }
    .about{
        width 200px
    }
}
</style>
<br>
<h1 style="text-align: center">Actualités</h1>
<br><br>
<div class="container">
    @foreach ($actualites as $actualite )
    <div class="card mb-3" style="max-width: 800px; height: 300px;">
        <div class="row g-0 actu">
            <div class="col-md-4">
                <img src="{{asset('storage/'.$actualite['image'])}}" alt="..."
                    class="img-fluid" style="height: 300px; width:400px;" />
            </div>
            <div class="col-md-8 about">
                <div class="card-body">
                    <h1 class="card-title">{{$actualite['titre']}}</h1>

                    <p class="card-text">{{Str::of($actualite['description'])->limit(550)}}</p>
                    <small class="text-muted">{{$actualite['updated_at']}}</small>

                    <br><br>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal{{$actualite['id']}}" style="">
                            Voir plus
                        </button>

                            <!-- Modal -->
                            <div class="modal fade" id="basicExampleModal{{$actualite['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true" >
                                <div class="modal-dialog" role="document">
                                <div class="modal-content" style="width: 700px; height:500px;">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{$actualite['titre']}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    {{$actualite['description']}}
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </div>
                            </div>

                        <!--End Modal-->
                </div>
            </div>
        </div>
    </div>


    @endforeach
</div>
@endsection
