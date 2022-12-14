<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function store(Request $request){
        $validation = $request -> validate([
            'userid' => 'required',
            'userpwd' => 'required',
        ]);

        $remember = $request -> input('remember');

        if(Auth::attempt($validation, $remember)){
            return redirect()->route('main');

        } else{
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('main');
    }

}
