<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ajout d'une activité
Route::get('/form-add-activite', 'App\Http\Controllers\ActiviteController@createNewActivityForm');
Route::post('/form-add-activite', 'App\Http\Controllers\ActiviteController@NewActivityForm');

//Ajout d'un événement
Route::get('/form-add-evenement', 'App\Http\Controllers\EvenementController@createEvenementForm');
Route::post('/form-add-evenement', 'App\Http\Controllers\EvenementController@EvenementForm');

//Voir les événements
Route::get('/list-evenement', 'App\Http\Controllers\EvenementController@listeEvenement');

//Voir un événement
Route::get('consult-evenement/{id}', 'App\Http\Controllers\EvenementController@consulter');

//Inscription à un événement
Route::get('form-inscription/{id}', 'App\Http\Controllers\ParticipantController@createNewParticipant');
Route::post('form-inscription/{id}', 'App\Http\Controllers\ParticipantController@NewParticipant');

//Augmenter le score
Route::get('add-point/{id}', 'App\Http\Controllers\ParticipantController@AjouterPoint');
Route::get('add-point/{id}', 'App\Http\Controllers\ParticipantController@AjouterPoint');

//Supprimer un utilisateur
Route::get('deleter-user/{id}', 'App\Http\Controllers\ParticipantController@deleteUser');

//Supprimer un évenement
Route::get('deleter-evenet/{id}', 'App\Http\Controllers\EvenementController@deleteEvenement');

//Administrer un evenement
Route::get('administration-evenement/{id}', 'App\Http\Controllers\GestionEvenementController@index');

//Modifier profil
Route::get('update-Inscript/{id}/{id}', 'App\Http\Controllers\GestionEvenementController@UpdateParticipant');

