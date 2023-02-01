@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <!-- Success message -->
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif

        @if(Auth::check())

        <br/>
        <div class="d-flex justify-content-center">
            <a href="{{ url('/form-add-activite')}}" class="btn btn-outline-primary nav-link text-black">Pas ton activité! Ajoute La !</a>
        </div>
        <br/>

        <form method="post" action="{{ action('App\Http\Controllers\EvenementController@createEvenementForm') }}">

        @csrf

        <div class="form-group">
            <label>Type d'activite :</label>
            <select name="Type" id="Type" class="form-control {{ $errors->has('Type') ? 'error' : '' }}">
                <option value="">--Chosir son activité--</option>
            @foreach($listeType as $Type)
                <option value="{{$Type->TypeActivite}}">{{$Type->TypeActivite}}</option>
            @endforeach

            </select>
            <!-- Error -->
            @if ($errors->has('Type'))
            <div class="error">
                {{ $errors->first('Type') }}
            </div>
            @endif
        </div>

        <div class="form-group">
            <label>Titre : </label>
            <input type="text" class="form-control {{ $errors->has('Titre') ? 'error' : '' }}" name="Titre"
                id="Titre">

            @if ($errors->has('Titre'))
            <div class="error">
                {{ $errors->first('Titre') }}
            </div>
            @endif
        </div>

        <div class="form-group">
            <label>StatuEquipe : </label>
            <select name="StatuEquipe" id="StatuEquipe" class="form-control {{ $errors->has('StatuEquipe') ? 'error' : '' }}">
                <option value="">--Chosir son statu--</option>
                <option value="Equipe">En Equipe</option>
                <option value="Solo">Solo</option>
            </select>

            @if ($errors->has('StatuEquipe'))
            <div class="error">
                {{ $errors->first('StatuEquipe') }}
            </div>
            @endif
        </div>

        <div class="form-group">
            <label>Nombre dans l'équipe :</label>
            <input type="text" class="form-control {{ $errors->has('NombreDansLEquipe') ? 'error' : '' }}" name="NombreDansLEquipe"
                id="NombreDansLEquipe">

            @if ($errors->has('NombreDansLEquipe'))
            <div class="error">
                {{ $errors->first('NombreDansLEquipe') }}
            </div>
            @endif
        </div>

        <div class="form-group">
            <label>Nombre de participan : </label>
            <input type="text" class="form-control {{ $errors->has('ParticipantMax') ? 'error' : '' }}" name="ParticipantMax"
                id="ParticipantMax">

            @if ($errors->has('ParticipantMax'))
            <div class="error">
                {{ $errors->first('ParticipantMax') }}
            </div>
            @endif
        </div>

        <div class="form-group">
            <label>Prix : </label>
            <input type="text" class="form-control {{ $errors->has('Prix') ? 'error' : '' }}" name="Prix"
                id="Prix">

            @if ($errors->has('Prix'))
            <div class="error">
                {{ $errors->first('Prix') }}
            </div>
            @endif
        </div>

        <div class="form-group">
            <label>Description : </label>
            <textarea type="text" class="form-control {{ $errors->has('Description') ? 'error' : '' }}" name="Description"
                id="Description" rows="3">
            </textarea>
            @if ($errors->has('Description'))
            <div class="error">
                {{ $errors->first('Description') }}
            </div>
            @endif
        </div>

        <div class="form-group">
            <label>Date de début :  </label>
            <input type="date" class="form-control {{ $errors->has('DateDebut') ? 'error' : '' }}" name="DateDebut"
                id="DateDebut">

            @if ($errors->has('DateDebut'))
            <div class="error">
                {{ $errors->first('DateDebut') }}
            </div>
            @endif
        </div>

        <div class="form-group">
            <label>Heure de début :  </label>
            <input type="time" class="form-control {{ $errors->has('HeureDebut') ? 'error' : '' }}" name="HeureDebut"
                id="HeureDebut">

            @if ($errors->has('HeureDebut'))
            <div class="error">
                {{ $errors->first('HeureDebut') }}
            </div>
            @endif
        </div>

        <div class="form-group">

            <input  name="Organisateur"   id="Organisateur" type="HIDDEN" value="{{ Auth::user()->getId() }}">
            <textarea>{{ Auth::user()->getId() }}</textarea>
            <textarea>{{ Auth::id()  }}</textarea>
             

            @if ($errors->has('Organisateur'))
            <div class="error">
                {{ $errors->first('Organisateur') }}
            </div>
            @endif

        </div>

        <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </form>

        @else
    
        <h2>Voous devez être connecter ! </h2>

        @endif

    </div>
@endsection