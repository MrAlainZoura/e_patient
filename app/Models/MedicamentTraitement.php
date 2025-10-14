<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicamentTraitement extends Model
{
    protected $fillable =[
        "medicament_id",
        "traitement_id"
    ];
     public function traitement(){
        return $this->belongsTo(Traitement::class);
    }

     public function medicatement(){
        return $this->belongsTo(Medicament::class);
    }
}
