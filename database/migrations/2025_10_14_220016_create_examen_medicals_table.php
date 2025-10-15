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
        Schema::create('examen_medicals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')
                ->constrained()
                ->noActionOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('personnel_medical_id')
                ->constrained()
                ->noActionOnDelete()
                ->cascadeOnUpdate();
            $table->string('libelle');
            $table->string('type')->nullable();
            $table->string('echantillon')->nullable();
            $table->string('resultat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examen_medicals');
    }
};
