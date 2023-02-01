<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use App\Activite;
class ActiviteController extends Controller
{
    // Create Form
  public function createNewActivityForm(Request $request) {
    return view('form-activite');
  }
  // Store Form data in database
  public function NewActivityForm(Request $request) {
      
    print_r(Auth::user()->id);

    // Form validation
      $this->validate($request, [
          'TypeActivite' => 'required'
       ]);

      //  Store data in database
      'App\Models\Activite'::create($request->all());
      //
      return back()->with('success', 'Les données ont été enregistrées avec succès.');
  }
}