<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registration(Request $request) {
        $request->validate([
            'firstname' => 'required',
            'firstname' => 'required',
            'firstname' => 'required',
            'firstname' => 'required',
        ])
        User::create([

        ]);
    }
}