<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Employe;
use App\Models\Poste;

class EmployeController extends Controller
{
    public function ListeAffections()
    {
        if (session("user")) {
            $matricule = session()->get('user')->employe_Matricule;
            $currentPoste = 'Aucun poste affecter';
            $employe = Employe::where('Matricule', '=', $matricule)->first();
            $postes = $employe->postes;
            $affectations = $employe->affectations;
            $absences = $employe->absences;

            // $currentPoste=$employe->affectations->sortBy('id',1)->toArray();
            if (count($postes)) {

                $numposte = Affectation::where('employe_Matricule', '=', $matricule)->orderBy("DateEntre", 'ASC')->get()->last()->poste_NumPoste;
                $currentPoste = Poste::where('NumPOste', '=', $numposte)->first()->Description;
            }

            return view("User.ProfileEmploye")->with(['employe' => $employe, 'postes' => $postes, 'affectations' => $affectations, 'absences' => $absences, 'currentPoste' => $currentPoste]);
        }
        
        return redirect(route("loginA"));
    }
}
