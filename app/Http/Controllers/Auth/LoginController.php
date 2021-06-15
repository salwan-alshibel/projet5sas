<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

        $request->email = htmlspecialchars($request->email);
        $request->password = htmlspecialchars($request->password);
        
        //Form validation. Not use actually, but using Javascript validation:
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        //Sign in:
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Adresse e-mail ou mot de passe invalide');
        }

        //Redirect:
        if(Session::has('oldUrl')) {
            
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            
            return redirect()->to($oldUrl);
        }
        
        return redirect()->route('dashboard'); 
    }
}