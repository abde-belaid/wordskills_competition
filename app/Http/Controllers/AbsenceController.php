<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Employe;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
   
    // les fonctionnalités des absences

    public function listeAbsence()
    {
        $absences = Absence::where("DateFin", '>', date('Y-m-d'))->paginate(10);
        return view('Backend.Responsable.Absence.absences')->with("absences", $absences);
    }
    public function addAbsence()
    {
        $employes = Employe::all()->pluck('Matricule');
        return view('Backend.Responsable.Absence.add')->with("employes", $employes);
    }
    public function SaveAbsence(Request $request)
    {
        $request->validate([
            'Matricule' => 'required',
            'Raison' => 'required',
            'DateDebut' => 'required',
            'DateFin' => 'required',
            'Justification' => 'required|mimes:pdf,doc,docx'
        ]);
        
        $absence = new Absence();
        $destinataire = public_path('Employe/Justification_Absence');

        $Nomfichier = $request->Matricule . $request->DateDebut . '.' . $request->Justification->extension();

        $request->Justification->move($destinataire, $Nomfichier);

        $absence->employe_Matricule = $request->Matricule;
        $absence->Raison = $request->Raison;
        $absence->DateDebut = $request->DateDebut;
        $absence->DateFin = $request->DateFin;
        $absence->Justification = $Nomfichier;
        $absence->save();

        return redirect(route('listeAbsence'))->with("messagesuccess", "L'absence est ajouter avec succes");
    }
}
