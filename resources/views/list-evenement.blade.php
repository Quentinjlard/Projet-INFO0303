@extends('layouts.app')

@section('content')

        <div class="text-center">
            <h1 class="text-black">Liste des événement</h1>
        </div>
        <br/>
        <div class="d-flex justify-content-center">
            <a href="{{ url('/form-add-evenement')}}" class="btn btn-outline-primary nav-link text-black">Crée votre événement</a>
        </div>
        <br/>
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
                  @guest
                  <a href="{{url('consult-evenement', $evenement->id)}}" class="btn btn-sm btn-primary mb-1">Consulter</a>
                  <a href="{{url('form-inscription' , $evenement->id)}}" class="btn btn-sm btn-primary mb-1">S'inscrire</a>
                  @else
                  <a href="{{url('consult-evenement', $evenement->id)}}" class="btn btn-sm btn-primary mb-1">Consulter</a>
                  <a href="{{url('form-inscription' , $evenement->id)}}" class="btn btn-sm btn-primary mb-1">S'inscrire</a>
                  <a href="{{url('deleter-evenet' , $evenement->id)}}" class="btn btn-sm btn-danger mb-1 disabled">Supprimer</a>
                  @endguest
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
@endsection
