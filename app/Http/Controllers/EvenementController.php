<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Evenement;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\DB;

//use App\Evenement;
class EvenementController extends Controller
{
    // Create Form
  public function createEvenementForm(Request $request) {
    $listeType = Activite::orderBy('TypeActivite')->get();

    return view('form-evenement', ['listeType' => $listeType]);
  }
  // Store Form data in database
  public function EvenementForm(Request $request) {

      
      print_r($_POST);
      //exit();

      // Form validation
      $this->validate($request, [
          'Type'=> 'required',
          'Titre'=> 'required',
          'StatuEquipe'=> 'required',
          'NombreDansLEquipe'=> 'required',
          'ParticipantMax'=> 'required',
          'Prix'=> 'required',
          'Description'=> 'required',
          'DateDebut'=> 'required',
          'HeureDebut'=> 'required',
          'Organisateur' => 'required'
       ]);

      //  Store data in database
      'App\Models\Evenement'::create($request->all());

      return back()->with('success', 'Les données ont été enregistrées avec succès.');
  }

  public function listeEvenement()
  {
    $listeEvenement = Evenement::orderBy('DateDebut', 'desc')->get();

    return view('list-evenement', ['listeEvenement' => $listeEvenement]);
  }

  public function consulter($id){
    $listeParticipant = Participant::orderBy('EvenementInscrit', 'desc')->get();
    return view('consult-evenement', ['evenement' => Evenement::findOrFail($id)], ['listeParticipant' => $listeParticipant]);
  }

  public function deleteEvenement($id)
    {
        $evenement = Evenement::findOrFail($id);
        $evenement->delete();

        $listeEvenement = Evenement::orderBy('DateDebut', 'desc')->get(); 
        return view('list-evenement', ['listeEvenement' => $listeEvenement]);
    }
}