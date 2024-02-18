<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuhentificationController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponsableController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// test routes

// Route::get('/', [EmployeController::class, "test"]);

// les routes dedie a l'authentifiaction
// afficher la formulaire
Route::get('/', [AuhentificationController::class, "LoginAction"])->name("loginA");
Route::get('/logout', [AuhentificationController::class, "logoutAction"])->name("logout");
// valider les donnees envoyer via la formulaire
Route::post('/loginA', [AuhentificationController::class, "LoginPost"])->name("authentifier");

// // la fonction retour 

// Route::get("/back",function(){
//     return back();
// })->name('back');

Route::group(['middleware' => "verifierAuth"], function () {


    // les routes dedie aux employées

    Route::get('/Profil_Employe', [EmployeController::class, "ListeAffections"])->name("Employe");

    // les routes dedie aux admins
    Route::group(["controller" => AdminController::class], function () {

        Route::get('/utilisateurs', "AjouterUtilisateur")->name("listeUtilisateurs");

        Route::get('/deleteUser/{id}', "deleteUser")->name('deleteUser');

        Route::post('/NouveauUtilisateur', "saveUser")->name("newUser");
    });



    //le route dedie au tableau de board
    Route::group(["controller" => ResponsableController::class], function () {

        Route::get('/home', "HomeAction")->name("home");
        
        Route::prefix("responsable")->group(function () {

            Route::get('/ListeEmployer', "ListeEmployer")->name("ListeEmployer");

            Route::get('/NouveauEmploye', "NouveauEmploye")->name('NouveauEmploye');

            Route::post('/saveEmloye', "saveEmloye")->name('saveEmloye');

            Route::get('/EditEmploye/{matricule}', "ModifierEmploye")->name("EditEmploye");
            Route::get('/deletEmploye/{matricule}', "deletEmploye")->name("deletEmploye");
            Route::post('/SaveEditEmploye', "SaveEditEmploye")->name("SaveEditEmploye");

            Route::get('/deleteSelectedEmploye/{matricule}', "deleteSelectedEmploye")->name("deleteSelectedEmploye");

            Route::post('/RechercheEmploye', "RechercheEmploye")->name('RechercheEmploye');

            Route::get('genererPDF', 'genererPDFAbsence')->name('genererPDF');

            // les routes prevus aux services 

            Route::get('/services', 'listeServices')->name('listeServices');
            Route::get('/editService/{numeroSer}', 'editService')->name('editService');
            Route::post('/updateService', 'updateService')->name('updateService');
            Route::get('/addService', 'addService')->name('addService');
            Route::post('/SaveService', 'SaveService')->name('SaveService');
            Route::get('/deleteService/{numeroSer}', 'deleteService')->name('deleteService');

            // les routes prevus aux postes
            Route::get('/listePostes', 'listePostes')->name('listePostes');
            Route::get('/editposte/{num}', 'editposte')->name('editposte');
            Route::post('/updatePoste', 'updatePoste')->name('updatePoste');
            Route::get('/addposte', 'addposte')->name('addposte');
            Route::post('/savePoste', 'savePoste')->name('savePoste');
            Route::get('/deleteposte/{num}', 'deleteposte')->name('deleteposte');

            // Route::get('/deleteAbsence/{num}', 'deleteAbsence')->name('deleteAbsence');
            Route::get('/getJustification/{num}', 'getJustification')->name('getJustification');

            // les routes prevus aux affectations

            Route::get("/affectation", 'listeAffectation')->name('listeAffectation');
            Route::get('/addAffectation', 'addAffectation')->name('addAffectation');
            Route::post('/SaveAffecation', 'SaveAffecation')->name('SaveAffecation');
        });
    });
    // les routes prevus aux absences 
Route::group(["controller"=>AbsenceController::class,"prefix"=>"responsable"],function(){
    
    Route::get('/listeAbsence', 'listeAbsence')->name('listeAbsence');
    Route::get('/addAbsence', 'addAbsence')->name('addAbsence');
    Route::post('/SaveAbsence', 'SaveAbsence')->name('SaveAbsence');
});

});





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
