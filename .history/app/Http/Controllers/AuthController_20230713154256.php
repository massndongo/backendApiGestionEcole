<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registration(Request $request)
    {

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);
        // Hasher le mot de passe
        $hashedPassword = Hash::make($request->password);
        $user = new User();
        $user->fill($request->all());
        if ($request->hasFile('image')) {
            $img = $request->image;
            $image = $request->file('image');
            $img = $image;
        }

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = $hashedPassword;
        $user->phone = $request->phone;
        $user->profil_id = $request->profil_id;
        $user->image = $request->image;
        // dd($request->image);

        // Créer un nouvel utilisateur et enregistrer les données dans la base de données
        $user->save();

        // Retourner une réponse JSON avec la ressource nouvellement créée et le code de statut HTTP approprié
        return response(['user' => $user], 201);
    }

    public function login(Request $request) {

        $fields = $request->validate([
            'email' =>  'required|string',
            'password' =>  'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Email ou password incorrect'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
}
