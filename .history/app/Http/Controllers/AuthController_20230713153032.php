<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {

        $fields = $request->validate([
            'email' =>  'required|string',
            'password' =>  'required|string'
        ]);

        // Check email
        $user
    }
}
