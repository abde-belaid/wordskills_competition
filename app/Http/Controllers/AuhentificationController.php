<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Employe;
use App\Models\Poste;
use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class AuhentificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function LoginAction()
    {
        if (session()->get('user')) {
            if (session()->get('user')->Profil === "employe") {
                return redirect()->route("Employe");
            } else if (session()->get('user')->Profil === "responsable") {
                return redirect("home");
            } else if (session()->get('user')->Profil === "admin") {
                $users = Utilisateur::all();
                session()->put(["users" => $users]);
                return redirect(route('listeUtilisateurs'));
            }

            return view("User.login");
        } else {

            return view("User.login");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function LoginPost(Request $request)
    {
        // verifier s'il y a un utilisateur avec le matricule saisi
        $request->validate([
            'matricule' => 'required',
            'code' => 'required',
            'profile' => 'required',
        ]);

        $user = Utilisateur::where('employe_Matricule', '=', $request->matricule)->first();

        if ($user) {

            if ($user->code === $request->code) {
                // si la connexion est effectué avec succes
                if ($user->Profil === "employe") {
                    session()->put(["user"=>$user]);
                    return redirect()->action([EmployeController::class,"ListeAffections"]);
                }
                 else if ($user->Profil === "responsable") {
                    $request->session()->put(["user" => $user]);
                    return redirect(route("home"));
                }
                 else if ($user->Profil === "admin") {
                    $request->session()->put(["user" => $user]);
                    return redirect()->action([AdminController::class, 'AjouterUtilisateur']);
                }
            } else {
                return back()->with("message", "aucun utilisateur trouver avec ces infos");
            }
        } else {
            return back()->with("message", "aucun utilisateur trouve avec ce matricule");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function logoutAction()
    {
        session()->flush();
        return redirect()->route('loginA');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
