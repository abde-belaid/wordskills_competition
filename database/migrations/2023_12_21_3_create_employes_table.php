<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->increments("Matricule");
            $table->string("nom",30);
            $table->string("CIN",10);
            $table->date("Datenaissance");
            $table->enum("EtatCivil",["Célebataire","Marie(e)","Divorcé(e)","Veuf(ve)"]);
            $table->integer("NBEnfant");
            $table->date("DateRecrutement");
            $table->integer("Echelle");
            $table->string("Adresse",60);
            $table->string("Photo",40);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
