<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registration(Request $request): Respon
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
        ]);
        // Hasher le mot de passe
        $hashedPassword = Hash::make($request->password);

        // Créer un nouvel utilisateur et enregistrer les données dans la base de données
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $hashedPassword,
            'phone' => $request->phone,

        ]);

        // Retourner une réponse JSON avec la ressource nouvellement créée et le code de statut HTTP approprié
        return response()->json([
            'user' => $user,
        ], 201);
    }
}
