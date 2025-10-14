<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    protected $fillable =[
        "libelle",
        "tranche_age",
        "posologie"
    ];

    public function medicamentTraitement(){
        return $this->hasMany(MedicamentTraitement::class);
    }
}
