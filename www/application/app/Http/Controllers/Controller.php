<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        $validation = $request -> validate([
            'userId' => 'required',
            'password' => 'required',
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
