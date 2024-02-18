<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class Employe extends Model
{
    use HasFactory;
    protected $fillable = [

        "CIN",
        "nom",
        "Datenaissance",
        "EtatCivil",
        "NBEnfant",
        "DateRecrutement",
        "Echelle",
        "Adresse",
        "Photo",

    ];
    public $timestamps = false;
    protected $primaryKey = "Matricule";

    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }

    public function absences(): HasMany
    {
        return $this->hasMany(Absence::class);
    }

    public function postes()
    {
        return $this->belongsToMany(Poste::class, 'affectations', 'employe_Matricule', 'poste_NumPoste');
    }
}
