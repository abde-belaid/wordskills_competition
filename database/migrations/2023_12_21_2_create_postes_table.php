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
        Schema::create('postes', function (Blueprint $table) {
            $table->increments("NumPoste");
            $table->unsignedInteger('service_NumService');
            $table->foreign("service_NumService")->references("NumService")->on("services")->onDelete('cascade')->onUpdate('cascade');
            $table->string("Description",60);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postes');
    }
};
