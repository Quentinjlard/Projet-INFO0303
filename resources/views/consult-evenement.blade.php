@extends('layouts.app')

@section('title') 
    Affichage d'un évenement
@endsection

@section('content')
<style>
.forecast {
    margin: 0;
    padding: .3rem;
    background-color: #eee;
    font: 1rem 'Fira Sans', sans-serif;
    justify-content: center;
    text-align: center;
}

.forecast > h1,
.day-forecast {
    margin: .5rem;
    padding: .3rem;
    font-size: 1.2rem;
}

.day-forecast {
    background: right/contain content-box border-box no-repeat
        url('/media/examples/rain.svg') white;
}

.day-forecast > h2,
.day-forecast > p {
    margin: .2rem;
    font-size: 1rem;
}
</style>

<article class="forecast">
    <h1>{{$evenement->Titre}}</h1>
    <h2>{{$evenement->Type}}</h2>
    <article class="day-forecast">
        <ul>
            <li>
                <h2>Date début : {{$evenement->DateDebut}}</h2>
            </li>
            <ul>
                <li>
                    <p>Type d'évenement : {{$evenement->HeureDebut}}</p>
                </li>
            </ul>
        </ul>
    </article>
    <article class="day-forecast">
        <ul>
            <li>
                <h2>Descripion : </h2>
            </li>
            <ul>
                <li>
                    <p>{{$evenement->Description}}</p>
                </li>
            </ul>
        </ul>
    </article>
    <article class="day-forecast">
        <ul>
            <li>
                <h2>Decroulement : </h2>
            </li>
            <ul>
                <li>Statu des équipes : {{$evenement->StatuEquipe}} </li>
                <li>Nombre dans l'équipe : {{$evenement->NombreDansLEquipe}}</li>
                <li>Nombre dans l'équipe : {{$evenement->ParticipantMax}}</li>
                <li>Prix d'inscription : {{$evenement->Prix}}</li>
            </ul>
        </ul>
    </article>

    <div class="d-flex justify-content-center">
        <a href="{{url('list-evenement')}}" class="btn btn-outline-primary nav-link text-black">Retour à la liste</a>
    </div>

</article>


@if($evenement->StatuEquipe == 'Solo')
    <h1>Liste des participants</h1>
@else
    <h1>Liste des équipes</h1>
@endif

<table class="table table-striped table-dark" style="text-align: center;">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Speudo Participant</th>
            <th scope="col">Score</th>
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
                        {{$Participant->Speudo}}
                    </td>
                    <td>
                        {{$Participant->Score}}
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
@endsection

