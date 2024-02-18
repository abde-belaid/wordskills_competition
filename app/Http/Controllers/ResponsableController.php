<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Affectation;
use App\Models\Employe;
use App\Models\Poste;
use App\Models\Service;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ResponsableController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */


    public function HomeAction()
    {

        // $users=Utilisateur::all();
        $employes = Employe::all();
        $postes = Poste::all();
        $services = Service::all();
        $absences = Absence::all();
        $absence_par_moi = Absence::groupBy(DB::raw("MONTH(DateDebut)"))
            ->select(DB::raw('MONTH(DateDebut) as mois'), DB::raw('count(employe_Matricule) as total_absences'))
            ->get();



        // dd($absence_par_moi[0]['mois']);
        if (session("user")->Profil === "responsable") {
            return view('User.dashboard')->with(["employes" => $employes, "postes" => $postes, "services" => $services, "absences" => $absences, "absence_par_moi" => $absence_par_moi]);
        }
        return redirect(route('loginA'));
    }



    public function SupprimerTousEmployees()
    {


    }

    public function NouveauEmploye()
    {
        return view("User.AjouterEmploye");
    }




    public function ListeEmployer()
    {
        $employes = Employe::all();
        return view("User.employe", compact("employes"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function genererPDFAbsence()
    {
        $employes = Employe::all();
        $absences = Absence::where("DateDebut", "=", date('Y-m-j'))->orwhere('DateFin', '>=', date('Y-m-j'))->get();
        $pdf = Pdf::loadView('User.PDFAbsence', ["absences" => $absences, "employes" => $employes])->setPaper('a4', 'portrait');
        // return $pdf->save(public_path('storage/Absence'.date('Y-m-j').'.pdf'));
        $pdf->save(public_path("storage") . '/' . "Absences_" . date('Y-m-j') . ".pdf");
        return $pdf->download("Absence" . date('Y-m-j') . ".pdf");


        // return back();
        // return view('User.PDFAbsence')->with(["absences"=>$absences,"employes"=>$employes]);
    }

    /**
     * Display the specified resource.
     */
    public function saveEmloye(Request $request)
    {
        $request->validate([
            "matricule" => 'required|integer|unique:employes',
            "cin" => 'required',
            "nom" => 'required',
            "datenaissance" => 'required',
            "etatCivil" => 'required',
            "nbEnfants" => 'required',
            "dateRecrutement" => 'required',
            "echelle" => 'required',
            "adresse" => 'required',
            "photo" => 'required|image|mimes:jpeg,png,jpg|max:2048'

        ]);
        $employe = new Employe();
        $employe->Matricule = $request->matricule;
        $employe->CIN = $request->cin;
        $employe->nom = $request->nom;
        $employe->Datenaissance = $request->datenaissance;
        $employe->EtatCivil = $request->etatCivil;
        $employe->NBEnfant = $request->nbEnfants;
        $employe->DateRecrutement = $request->dateRecrutement;
        $employe->Echelle = $request->echelle;
        $employe->Adresse = $request->adresse;

        $photo = $request->photo;
        $destinataire = public_path("images_Emplyes");

        $imageName = $request->matricule . "." . $request->photo->extension();
        $employe->Photo = $imageName;
        $photo->move($destinataire, $imageName);
        $employe->save();
        return redirect(route('ListeEmployer'))->with("messagesuccess", "l'employe est inserer avec success");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function ModifierEmploye($id)
    {
        $employe = Employe::where("Matricule", $id)->get()->first();
        return view('User.editEmploye')->with('employe', $employe);
    }

    /**
     * Update the specified resource in storage.
     */
    public function SaveEditEmploye(Request $request)
    {
        $request->validate([
            "CIN" => 'required',
            "nom" => 'required',
            "Datenaissance" => 'required',
            "EtatCivil" => 'required',
            "NBEnfant" => 'required',
            "DateRecrutement" => 'required',
            "Echelle" => 'required',
            "Adresse" => 'required',
            "photo" => 'required|image|mimes:jpeg,png,jpg|max:2048'

        ]);

        $employe = Employe::where('Matricule', '=', $request->Matricule)->get()->first();
        $employe->CIN = $request->CIN;
        $employe->nom = $request->nom;
        $employe->Datenaissance = $request->Datenaissance;
        $employe->EtatCivil = $request->EtatCivil;
        $employe->NBEnfant = $request->NBEnfant;
        $employe->DateRecrutement = $request->DateRecrutement;
        $employe->Echelle = $request->Echelle;
        $employe->Adresse = $request->Adresse;

        $photo = $request->photo;
        $destinataire = public_path("images_Emplyes");

        $imageName = $request->Matricule . "." . $request->photo->extension();
        $employe->Photo = $imageName;
        $photo->move($destinataire, $imageName);
        $employe->update();
        return redirect(route('ListeEmployer'))->with("messagesuccess", "Les informations de l'employé sont modifier avec success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletEmploye(string $id)
    {
        $employe = Employe::where('Matricule', '=', $id);
        $employe->delete();
        return redirect(route('ListeEmployer'))->with("messagesuccess", "L'employé est supprimer avec success");
    }
    public function deleteSelectedEmploye($options)
    {
        if ($options === "all") {
            dd($options);
            Employe::truncate();
            return redirect(route('ListeEmployer'))->with("messagesuccess", "Les employes sont supprimer avec succes");
        } else {
            $matricules = explode("-", $options);

            foreach ($matricules as $key => $value) {
                Employe::where('Matricule', '=', (int) $value)->delete();
            }
            return redirect(route('ListeEmployer'))->with("messagesuccess", "Les employes sont supprimer avec succes");
        }
    }


    public function RechercheEmploye(Request $request){
        $employes=Employe::where($request->Criter,'like',"%".$request->motcle."%")->get();
        return view("User.employe", compact("employes"));
    }

    // les fonctionnalités des services 

    public function listeServices()
    {
        $services = Service::paginate(10);
        return view('Backend.Responsable.Service.services')->with('services', $services);
    }
    public function editService($num)
    {
        $service = Service::where('NumService', '=', $num)->first();
        return view('Backend.Responsable.Service.edit')->with('service', $service);
    }

    public function updateService(Request $request)
    {
        $service = Service::where('NumService', '=', $request->NumService)->get()->first();
        $service->intitule = $request->intitule;
        $service->update();
        return redirect(route('listeServices'))->with("messagesuccess", "Le service est modifier avec succes");
    }

    public function deleteService($num)
    {
        Service::where("NumService", '=', $num)->delete();
        return redirect(route('listeServices'))->with("messagesuccess", "Le service est supprimer avec succes");
    }


    public function addService()
    {
        return view('Backend.Responsable.Service.add');
    }
    public function SaveService(Request $request)
    {
        $request->validate(
            ['intitule' => 'required']
        );
        $service = new Service();
        $service->intitule = $request->intitule;
        $service->save();
        return redirect(route('listeServices'))->with("messagesuccess", "Le service est ajouter avec succes");
    }

    // les fonctionnalités des postes

    public function listePostes()
    {
        $postes = Poste::paginate(10);
        $services = Service::all();
        return view('Backend.Responsable.Poste.Postes')->with(['postes' => $postes, 'services' => $services]);
    }
    public function editposte($num)
    {
        $poste = Poste::where('NumPoste', '=', $num)->first();
        // dd($poste);
        $services = Service::all();
        return view('Backend.Responsable.Poste.edit')->with(["poste" => $poste, 'services' => $services]);
    }
    public function updatePoste(Request $request)
    {
        $poste = Poste::where('NumPoste', '=', $request->NumPoste)->first();
        $poste->Description = $request->Description;
        $poste->service_NumService = $request->service;
        $poste->update();
        return redirect(route('listePostes'))->with("messagesuccess", "Le poste est Modifier avec succes");
    }
    public function addposte()
    {
        $services = Service::all();
        return view("Backend.Responsable.Poste.add", compact('services'));
    }

    public function savePoste(Request $request)
    {
        $request->validate(
            [
                'service' => 'required',
                'Description' => 'required'
            ]
        );

        $poste = new Poste();
        $poste->Description = $request->Description;
        $poste->service_NumService = $request->service;
        $poste->save();
        return redirect(route('listePostes'))->with("messagesuccess", "Le poste est ajouté avec succes");
    }
    public function deleteposte($num)
    {
        Poste::where('NumPoste', '=', $num)->first()->delete();
        return redirect(route('listePostes'))->with("messagesuccess", "Le poste est supprimé avec succes");
    }


    // public function deleteAbsence($num)
    // {

    //     Absence::where("idAbs", "=", $num)->delete();

    //     return redirect(route('listeAbsence'))->with("messagesuccess", " L'absence est supprimer avec succes");
    // }

    public function getJustification($path)
    {
        $file = public_path('Employe/Justification_Absence/' . $path);

        // $file_name = 'custom_file_name.pdf';
        // return response()->download($file, $file_name); // pour avoir personnaliser le nom de fichier 
        // $destinataire = storage_path('Justification_Absence');

        return response()->download($file)->deleteFileAfterSend(true);
    }


    //les fonctionnalites prévus aux affectation

    public function listeAffectation()
    {
        $affectations = Affectation::paginate(10);
        return view('Backend.Responsable.Affectation.affectations')->with("affectations", $affectations);
    }

    public function addAffectation()
    {
        $employes = Employe::all();
        $postes = Poste::all();
        return view('Backend.Responsable.Affectation.add')->with(["employes" => $employes, "postes" => $postes]);
    }
    public function SaveAffecation(Request $request)
    {
        $request->validate(
            [
                'Matricule' => 'required',
                'NumPoste' => 'required',
                'DateEntre' => 'required|date',
                'DateSortie' => 'nullable|date',
                'Salaire' => 'required|numeric'

            ]
        );
        $affectation = new Affectation();
        $affectation->employe_Matricule = $request->Matricule;
        $affectation->poste_NumPoste = $request->NumPoste;
        $affectation->DateEntre = $request->DateEntre;
        $affectation->DateSortie = $request->DateSortie;
        $affectation->Salaire = $request->Salaire;

        $affectation->save();

        return redirect(route('listeAffectation'))->with('messagesuccess', 'L\'affecatation est effectuer avec succes');
    }
}
