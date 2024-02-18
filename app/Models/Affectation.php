<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Affectation extends Model
{
    public $table="affectations";
    use HasFactory;
   
    protected $fillable=[
        "poste_NumPoste",
        "employe_Matricule",
        "DateEntre",
        "DateSortie",
        "Salaire",
    ];
    
    // protected $primaryKey = ["id","employe_Matricule","poste_NumPoste"];
    public $timestamps=false;


    public function employes():belongsToMany
    {
        return $this->belongsToMany(Employe::class);
    }

    public function postes():belongsToMany
    {
        return $this->belongsToMany(Poste::class);
    }
}
