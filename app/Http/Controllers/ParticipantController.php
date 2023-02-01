<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Evenement;
use App\Models\Participant;
use Illuminate\Http\Request;
//use App\Participant;
class ParticipantController extends Controller
{
    // Create Form
    public function createNewParticipant(Request $request, $id) {
      $idevent = ['evenement' => Evenement::findOrFail($id)];
      return view('form-participant', $idevent);
    }
    // Store Form data in database
    public function NewParticipant(Request $request) {

      //print_r($_POST);
      //exit();
  
        // Form validation
        $this->validate($request, [
              'NomP'=> 'required',
              'PrenomP'=> 'required',
              'Speudo'=> 'required',
              'AgeP'=> 'required',
              'Score'=> 'required',
              'EvenementInscrit'=> 'required'
         ]);
  
        //  Store data in database
        'App\Models\Participant'::create($request->all());
        //
        return back()->with('success', 'Les données ont été enregistrées avec succès.');
    }

    public function AjouterPoint($id){
      return view('add-point-participant', ['Participant' => Participant::findOrFail($id)],  ['Evenement' => Evenement::findOrFail($id)]);
    }



    public function update(Request $request, Participant $participant, Evenement $evenement)
    {
      $participant->update([
        'NomP' => $request->input('NomP'),
        'PrenomP' => $request->input('PrenomP'),
        'Speudo' => $request->input('Speudo'),
        'AgeP' => $request->input('AgeP'),
        'Score' => $request->input('Score')
      ]);
      return redirect()->route('consult-evenemen', [$evenement]);
    }
}
