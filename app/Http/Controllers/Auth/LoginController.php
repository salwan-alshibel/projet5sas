<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }


    public function store(Request $request){
        //Form validation:
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //Sign in:
        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Adresse e-mail ou mot de passe invalide');
        }

        //Redirect:
        return redirect()->route('dashboard');
    }
}
