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
}
