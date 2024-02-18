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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->increments("idUtilisateur");
            $table->unsignedInteger('employe_Matricule');
            $table->foreign("employe_Matricule")->references("Matricule")->on("employes")->onDelete("cascade")->onUpdate("cascade");
            $table->string("code",20);
            $table->string("Profil",15);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
