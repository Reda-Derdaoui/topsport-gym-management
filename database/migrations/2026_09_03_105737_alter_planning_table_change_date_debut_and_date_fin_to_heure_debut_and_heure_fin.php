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
        Schema::table('plannings', function (Blueprint $table) {
            $table->dropColumn('dateDebut');
            $table->dropColumn('dateFin');
            $table->dropColumn('Heure');

            $table->enum(
                'jour_semain',
                [
                    'lundi',
                    'mardi',
                    'mercredi',
                    'jeudi',
                    'vendredi',
                    'samedi',
                    'dimanche'
                ]
            );

            $table->time('heure_debut');
            $table->time('fin');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plannings', function (Blueprint $table) {
            $table->dropColumn('dateDebut');
            $table->dropColumn('dateFin');
            $table->dropColumn('Heure');

            $table->enum(
                'jour_semain',
                [
                    'lundi',
                    'mardi',
                    'mercredi',
                    'jeudi',
                    'vendredi',
                    'samedi',
                    'dimanche'
                ]
            );

            $table->time('heure_debut')->after('activite_id');
            $table->time('heure_fin')->after('heure_debut');
        });
    }
};
