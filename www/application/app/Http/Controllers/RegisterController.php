<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }


    public function store(Request $request)
    {
        $validation = $request -> validate([
            'userid' => 'required|min:6|max:12|unique:users|string',
            'password' => 'required|min:10|max:16|confirmed',
            'email' => 'required|email'
        ]);

        User::create([
            'userid' => $validation['userId'],
            'userpwd' => Hash::make($validation['password']),
            'useremail' => $validation['email']
        ]);

        return redirect('/');
    }
}
