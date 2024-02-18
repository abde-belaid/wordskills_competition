<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class ApiController extends Controller
{

 public function index(){
    $employes=Employe::with('postes')->get();
    return response()->json($employes);
 }

}
