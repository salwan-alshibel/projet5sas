<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    
    //If already login, redirect to home(change redirection at app\Providers\RouteServiceProvider.php):
    public function __construct(){
        $this->middleware(['guest']);
    }
    
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        
        $request->name = htmlspecialchars($request->name);
        $request->username = htmlspecialchars($request->username);
        $request->email = htmlspecialchars($request->email);
        $request->password = htmlspecialchars($request->password);

        //Form validation:
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        //Create user:
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        //Sign in:
        auth()->attempt($request->only('email', 'password'));

        //Redirect:
        if(Session::has('oldUrl')) {
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }
        return redirect()->route('dashboard');

    }
}
