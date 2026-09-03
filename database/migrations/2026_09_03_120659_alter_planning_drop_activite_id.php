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
        Schema::table('plannings', function (Blueprint $table) {
            $table->dropForeign(['activite_id']);
            $table->dropColumn('activite_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('planning', function (Blueprint $table) {
              $table->dropForeign('activite_id');
            $table->dropColumn('activite_id');
        });
    }
};
