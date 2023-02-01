<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    public $fillable = [
        'Type',
        'Titre',
        'StatuEquipe',
        'NombreDansLEquipe',
        'ParticipantMax',
        'Prix',
        'Description',
        'DateDebut',
        'HeureDebut',
        'Organisateur'
    ];
    
    use HasFactory;
    
}
