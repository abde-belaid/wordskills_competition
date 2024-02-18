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
        Schema::create("absences",function(Blueprint $table){

            $table->bigIncrements("idAbs");
            $table->unsignedInteger('employe_Matricule');
            $table->foreign("employe_Matricule")->references("Matricule")->on("employes")->onDelete('cascade')->onUpdate('cascade');
            $table->string("Raison",60);
            $table->date('DateDebut');
            $table->date("DateFin");
            $table->string("Justification",20);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
