<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelTraitement extends Model
{
    protected $fillable = [
        "traitement_id",
        "personnel_medical_id"
    ];

    public function personnel(){
        return $this->belongsTo(PersonnelMedical::class);
    }
    public function traitement(){
        return $this->belongsTo(Traitement::class);
    }
}
