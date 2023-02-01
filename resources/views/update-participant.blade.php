
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ action('App\Http\Controllers\ParticipantController@update', $Participant->id, $evenement->id) }}" method="get">
  @csrf 
  <div class="mb-3 row">
    <label for="NomP" class="col-sm-2 col-form-label">Nom Participant : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control @error('NomP') is-invalid @enderror" name="NomP" id="NomP" placeholder="Nom du participant" value="{{$Participant->NomP}}"/>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="PrenomP" class="col-sm-2 col-form-label">Prénom Participant : </label>
    <div class="col-sm-10">
        <input type="text" class="form-control @error('PrenomP') is-invalid @enderror" name="PrenomP" id="PrenomP" placeholder="Prénom de l'actualité" value="{{$Participant->PrenomP}}"/>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="Speudo" class="col-sm-2 col-form-label">Speudo : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Speudo" id="Speudo" placeholder="Speudo du participant" value="{{$Participant->Speudo}}"/>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="Score" class="col-sm-2 col-form-label">Score : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Score" id="Score" placeholder="Score du participant" value="{{$Participant->Score}}"/>
    </div>
  </div>
  <div class="mb-3">
    <div class="offset-sm-2 col-sm-10">
      <button class="btn btn-primary mb-1 mr-1" type="submit">Modifier</button>
      <a href="{{url('/list-evenement')}}" class="btn btn-danger mb-1">Annuler</a>
    </div>
  </div>
</form>
</div>