<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Poste;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function AjouterUtilisateur()
    {
        
        $users = Utilisateur::where("Profil", "!=", "admin")->paginate(10);
        $employes = Employe::all();
        if (session("user")->Profil == 'admin') {

            return view("User.utilisateurs")->with(["users" => $users, 'employes' => $employes]);
        }
        return redirect(route("loginA"));
    }

    public function saveUser(Request $request)
    {

        $user = Utilisateur::where('employe_Matricule', $request->matricule)->first();
        if ($user) {
            session()->flash('messagewarning', "Cette compte utilisateur est déja existe !");

            return back();
        } else {
            $utilisateur = new Utilisateur();
            $utilisateur->employe_Matricule = $request->matricule;
            $utilisateur->code = $request->password;
            $utilisateur->Profil = $request->profile;
            $utilisateur->save();
            session()->flash('messagesuccess', "Le compte utilisateur est ajouter avec success!");
            return back();
        }
    }

    // public function ModifierUser($matricule)
    // {
    //     $user = Utilisateur::where("employe_Matricule", $matricule)->first();
    //     return view("User.EditEmploye");
    // }



    public function deleteUser($id)
    {
        Utilisateur::where('employe_Matricule', '=', $id)->first()->delete();
        session()->flash('messagesuccess', "Le compte utilisateur est supprimer avec success!");
        return redirect(route("listeUtilisateurs"));
    }
}
