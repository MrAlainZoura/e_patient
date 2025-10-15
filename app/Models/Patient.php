<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        "user_id",
        "nom_complet",
        "genre",
        "date_naissance",
        "adresse",
        "telephone",
        "code"
    ];

     public function consultationn(){
        return $this->hasMany(Consultation::class);
    }
     public function examen(){
        return $this->hasMany(ExamenMedical::class);
    } 
     public function traitement(){
        return $this->hasMany(Traitement::class);
    } 
}
