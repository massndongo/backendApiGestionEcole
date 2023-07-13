<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registration(Request $request) {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'image'
        ]);
        $password = $request->password;
        $password = Hash::make($request->password);
        // $password = bcrypt('my-secret-password');
        return User::create($request->all());
    }
}
