<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    function updateProfil(Request $request, $id): Response
    {
        if (!$request->filled('libelle')) {
            return (['error' => 'Le libellé ne peut pas être vide.'], 422);
        }
        $profil = Profil::find($id);
        if ($profil) {
            $newLibelle = $request->input('libelle');
            $profil->libelle = $newLibelle;
            $profil->save();
            return new Response('Success', 200);
        }
        else {
            return new Response('', 404);
        }
    }
}
