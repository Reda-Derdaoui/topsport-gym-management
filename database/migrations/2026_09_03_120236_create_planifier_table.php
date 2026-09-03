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
        Schema::create('planifier', function (Blueprint $table) {
            $table->foreignId('activite_id')->constrained('activites')->cascadeOnDelete();
            $table->foreignId('planning_id')->constrained('plannings')->cascadeOnDelete();

            $table->primary(['activite_id', 'planning_id']);





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planifier');
    }
};
