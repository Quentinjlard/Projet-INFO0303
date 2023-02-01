@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <h2>Vos Lans</h2>
                    <table class="table table-striped table-dark" style="text-align: center;">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Activoté</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Type (équipe / solo )</th>
                            <th scope="col">Nombre par équipe</th>
                            <th scope="col">Nombre participant max</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Date début</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($listeEvenement as $evenement)
                        @if($evenement->Organisateur == Auth::user()->getId())
                        <tr>
                        <td>
                            {{$evenement->id}}
                        </td>
                        <td>
                            {{$evenement->Type}}
                        </td>
                        <td>
                            <strong > {{$evenement->Titre}}</strong>
                        </td>
                        <td>
                            {{$evenement->StatuEquipe}}
                        </td>
                        <td>
                            {{$evenement->NombreDansLEquipe}}
                        </td>
                        <td>
                            {{$evenement->ParticipantMax}}
                        </td>
                        <td>
                            {{$evenement->Prix}}
                        </td>
                        <td>
                            {{$evenement->DateDebut}}
                        </td>
                        <td>
                            <div class="col">
                                <a href="{{url('administration-evenement', $evenement->id)}}" class="btn btn-sm btn-primary mb-1">Administrer</a>
                                <a href="{{url('deleter-evenet' , $evenement->id)}}" class="btn btn-sm btn-danger mb-1 ">Supprimer</a>
                            </div>
                        </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
