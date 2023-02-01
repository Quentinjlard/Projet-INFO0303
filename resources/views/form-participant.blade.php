@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <!-- Success message -->
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
            <br/>
            <a href="{{url('consult-evenement', $evenement->id)}}" class="btn btn-sm btn-primary mb-1">Retour à l'évenement</a>
        </div>
        @endif

        <form action="" method="post" action="{{ action('App\Http\Controllers\ParticipantController@createNewParticipant', $evenement->id) }}">

            @csrf

            <div class="form-group">
                <label>Nom participant : </label>
                <input type="text" class="form-control {{ $errors->has('NomP') ? 'error' : '' }}" name="NomP" id="NomP">

                <!-- Error -->
                @if ($errors->has('NomP'))
                <div class="error">
                    {{ $errors->first('NomP') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Prénom participant : </label>
                <input type="text" class="form-control {{ $errors->has('PrenomP') ? 'error' : '' }}" name="PrenomP"
                    id="PrenomP">

                @if ($errors->has('PrenomP'))
                <div class="error">
                    {{ $errors->first('PrenomP') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Speudo participant : </label>
                <input type="text" class="form-control {{ $errors->has('Speudo') ? 'error' : '' }}" name="Speudo"
                    id="Speudo">

                @if ($errors->has('Speudo'))
                <div class="error">
                    {{ $errors->first('Speudo') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Age :</label>
                <input type="text" class="form-control {{ $errors->has('AgeP') ? 'error' : '' }}" name="AgeP"
                    id="AgeP">

                @if ($errors->has('AgeP'))
                <div class="error">
                    {{ $errors->first('AgeP') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <input  name="EvenementInscrit"   id="EvenementInscrit" type="HIDDEN" value="{{$evenement->id}}">

                @if ($errors->has('EvenementInscrit'))
                <div class="error">
                    {{ $errors->first('EvenementInscrit') }}
                </div>
                @endif
            
            </div>

            <div class="form-group">
        
                <input  name="Score"   id="Score" type="HIDDEN" value="0">

                @if ($errors->has('Score'))
                <div class="error">
                    {{ $errors->first('Score') }}
                </div>
                @endif
            
            </div>

            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </form>
    </div>
@endsection
