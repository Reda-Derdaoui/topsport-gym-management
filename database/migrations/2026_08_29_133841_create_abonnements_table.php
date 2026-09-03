<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('abonnements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('typeAbonnement_id')->constrained('type_abonnement')->onDelete('cascade');
            $table->foreignId('adherent_id')->constrained('adherents')->onDelete('cascade');
            $table->foreignId('responsable_id')->constrained('responsables')->onDelete('cascade');
            $table->date('DateDebut');
            $table->date('DateFin');
            $table->integer('Prix');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnements');
    }
};
