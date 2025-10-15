<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamenMedical extends Model
{
    protected $fillable = [
        "patient_id",
        "personnel_medical_id",
        "libelle",
        "type",
        "echantillon",
        "resultat"
    ];

      public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function personnel(){
        return $this->belongsTo(PersonnelMedical::class);
    }
}
