<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable =  [
        "patient_id",
        "personnel_medical_id",
        "date_rdv",
        "observationn"
    ];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function personnel(){
        return $this->belongsTo(PersonnelMedical::class);
    }
}
