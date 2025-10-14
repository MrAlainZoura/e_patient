<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suivi extends Model
{
    protected $fillable = [
        "traitement_id",
        "date_rdv",
        "observation",
        "orientation"
    ];

    public function traitement(){
        return $this->belongsTo(Traitement::class);
    }
}
