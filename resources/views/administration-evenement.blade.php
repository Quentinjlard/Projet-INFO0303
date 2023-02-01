@extends('layouts.app')

@section('title') 
    administration Evenement
@endsection

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">

<h1>Personne inscrite</h1>

<table class="table table-striped table-dark" style="text-align: center;">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Speudo</th>
            <th scope="col">Score</th>
            @guest
            @else
            <th scope="col">Action</th>
            @endguest
        </tr>
    </thead>
    <tbody>
        @foreach($listeParticipant as $Participant)
            @if($evenement->id == $Participant->EvenementInscrit)
                <tr>
                    <td>
                        {{$Participant->id}}
                    </td>
                    <td>
                        {{$Participant->NomP}}
                    </td>
                    <td>
                        {{$Participant->PrenomP}}
                    </td>
                    <td>
                        {{$Participant->Speudo}}
                    </td>
                    <td>
                        {{$Participant->Score}}
                    </td>
                    @guest
                    @else
                    <td>
                        <div class="col">
                            <a href="#" class="btn btn-sm btn-primary mb-1">Gerer l'inscrit</a>
                            <form method="GET" action="{{ action('App\Http\Controllers\GestionEvenementController@deleteUser', $Participant->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Désinscrire</button>
                            </form>
                        </div>
                    </td>
                    @endguest
                </tr>
            @endif
        @endforeach
</div>
</div>
</div>
</div>

        @endsection