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
        Schema::create('affectations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('employe_Matricule');
            $table->unsignedInteger('poste_NumPoste');
            $table->foreign("poste_NumPoste")->references("NumPoste")->on("postes")->onDelete('cascade')->onUpdate('cascade');
            $table->foreign("employe_Matricule")->references("Matricule")->on("employes")->onDelete('cascade')->onUpdate('cascade');
            $table->date("DateEntre");
            $table->date("DateSortie")->nullable();
            $table->float("Salaire");
            // $table->primary(["poste_NumPoste","employe_Matricule","id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectations');
    }
};
