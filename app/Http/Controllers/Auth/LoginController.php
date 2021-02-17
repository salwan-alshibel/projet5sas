<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    //If already login, redirect to home(change redirection at app\Providers\RouteServiceProvider.php):
    public function __construct(){
        $this->middleware(['guest']);
    }
    
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
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Adresse e-mail ou mot de passe invalide');
        }

        //Redirect:
        return redirect()->route('dashboard');
    }
}
