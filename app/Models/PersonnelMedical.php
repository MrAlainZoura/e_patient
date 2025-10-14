<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelMedical extends Model
{
    protected $fillable = [
        "user_id",
        "nom_complet",
        "genre",
        "fonction",
        "specialition",
        "grade",
        "matricule",
        "telephone"
    ];
}
