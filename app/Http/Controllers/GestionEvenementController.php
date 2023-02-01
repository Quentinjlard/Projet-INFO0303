<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Participant;
use Illuminate\Http\Request;

class GestionEvenementController extends Controller
{
    public function index($id){
        $listeParticipant = Participant::orderBy('EvenementInscrit', 'desc')->get();
        return view('administration-evenement', ['evenement' => Evenement::findOrFail($id)], ['listeParticipant' => $listeParticipant]);
    }

    public function deleteUser($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();

        $listeEvenement = Evenement::orderBy('DateDebut', 'desc')->get(); 
        return view('list-evenement', ['listeEvenement' => $listeEvenement]);
    }

    public function UpdateParticipant ($evenement, $participant){

        

        return view('administration-evenement', $evenement);
    }
}

