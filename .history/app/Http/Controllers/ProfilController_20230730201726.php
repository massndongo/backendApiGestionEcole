<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;

class ProfilController extends Controller
{
    //
    function addProfil(Request $request) : JsonResponse {

        $request->validate([
            'libelle' => 'required',
        ]);

        $profil = Profil::create([
            'libelle' => $request->libelle
        ]);

        return response()->json(['profil' => $profil], 201);
    }

    function updateProfil(Request $request, Profil $profile, $id): JsonResponse
    {
        // if ($request->user()->cannot('update', $profile)) {
        //     abort(403);
        // }
        if (FacadesGate::denies('update', $profile)) {
            return response()->json(['message' => 'Vous ne pouvez pas modifier le profil car vous n\'êtes pas admin.'], 403);
        }


        $profil = Profil::find($id);
        if ($profil) {
            $newLibelle = $request->input('libelle');
            $profil->libelle = $newLibelle;
            $profil->save();
            return response()->json('Success', 200);
        }
        else {
            return response()->json('Not found', 404);
        }
    }
}
