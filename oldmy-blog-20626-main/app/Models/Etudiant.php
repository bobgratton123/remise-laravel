<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_nom',
        'adresse',
        'phone',
        'email',
        'date_de_naissance',
        'villes_idvilles',
        'users_id'
    ];

}
