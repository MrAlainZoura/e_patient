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

     public function personnelTraitement(){
        return $this->hasMany(PersonnelTraitement::class);
    }
     public function consultationn(){
        return $this->hasMany(Consultation::class);
    }
     public function examen(){
        return $this->hasMany(ExamenMedical::class);
    }
}
