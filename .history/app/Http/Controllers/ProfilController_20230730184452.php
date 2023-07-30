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

    function updateProfil($id, Request $request): Response
    {
        $profil = Profil::find($id);
        if ($profil) {
            $request->validate([
                'libelle' => 'required',
            ]);
            $profil->libelle = $request->libelle;
            $profil->save();
            
        }
    }
}
