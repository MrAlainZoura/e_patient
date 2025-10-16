<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Afficher tous les patients
    public function index()
    {
        $patients = Patient::all();
        return response()->json($patients);
    }

    //Créer un nouveau patient
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'nom_complet' => 'required|string|max:255',
            'genre' => 'required|string',
            'date_naissance' => 'required|date',
            'adresse' => 'required|string',
            'telephone' => 'required|string',
            'code' => 'required|string|unique:patients,code',
        ]);

        $patient = Patient::create($validated);
        return response()->json($patient, 201);
    }

    // Afficher un patient spécifique
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return response()->json($patient);
    }

    // Mettre à jour un patient
    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'sometimes|integer',
            'nom_complet' => 'sometimes|string|max:255',
            'genre' => 'sometimes|string',
            'date_naissance' => 'sometimes|date',
            'adresse' => 'sometimes|string',
            'telephone' => 'sometimes|string',
            'code' => 'sometimes|string|unique:patients,code,' . $id,
        ]);

        $patient->update($validated);
        return response()->json($patient);
    }

    // Supprimer un patient
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return response()->json(['message' => 'Patient supprimé avec succès']);
    }
}