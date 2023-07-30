<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $profil = Profil::find($id);
        if ($profil) {
            $newLibelle = $request->input('libelle');
            dd($newLibelle);
            $profil->libelle = $newLibelle;
            $profil->save();
            return new Response('Success', 200);
        }
        else {
            return new Response('', 404);
        }
    }
}
