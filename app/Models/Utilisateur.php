<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    protected $primaryKey = "idUtilisateur";
    protected $fillable=[

        "Matricule",
        "code",
        "Prodil",
    ];
    public $timestamps=false;
}
