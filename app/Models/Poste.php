<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Poste extends Model
{
    use HasFactory;
    protected $fillable=[
        "Description",
        "NumService",
    ];
    public $timestamps=false;
    protected $primaryKey = "NumPoste";

    public function employes()
    {
        return $this->belongsToMany(Employe::class, 'affectations', 'employe_Matricule', 'poste_NumPoste');
    }

    public function affectations(): HasMany
    {
        return $this->hasMany(Affectation::class);
    }
}
