<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absence extends Model
{
    use HasFactory;
    protected $fillable=[
        "Matricule",
        "Raison",
        "DateDebut",
        "DateFin",
        "Justification",
    ];
    public $timestamps=false;
    protected $primaryKey = 'idAbs';
    // protected $primaryKey = null;

    public function employe():BelongsTo
    {
        return $this->belongsTo(Employe::class);
    }
}
