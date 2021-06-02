<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    
    public function __construct() {
       $this->middleware(['auth']); 
    }
    
    public function index() {
        //dd(auth()->user()->posts);
        return view('dashboard.dashboard_home');
    }

    public function updateProfile(Request $request) {
        if($request->id) {

            //Form validation:
            $this->validate($request, [
                'name' => 'unique:users|max:255',
                'username' => 'unique:users|max:255',
                'email' => 'unique:users|email|confirmed',
            ]);

            $param = [
                ['name' => $request->name],
                ['username' => $request->username],
                ['adress' => $request->adress],
                ['email' => $request->email]
            ];

            foreach ($param as $key => $value) {
                foreach ($value as $key => $value) {
                    if (isset($value)) {
                        DB::table('users')
                        ->where('id', $request->id)
                        ->update([
                            $key => $value,
                        ]);
                    }
                }
            } 
            return back();
        }
        return view('dashboard.dashboard_profile');
    }

    public function updatePassword(Request $request) {
        if($request->id) {
            
            if(Hash::check($request->old_password, auth()->user()->password)){
             
            //Form validation:
            $this->validate($request, [
                'new_password' => 'required|confirmed',
                'new_password_confirmation' => 'same:new_password',
            ]);

            DB::table('users')
                ->where('id', $request->id)
                ->update(['password'=> Hash::make($request->new_password)]);
            return back()->with('new_pwd_succes', 'Mot de passe changé avec succes !');
            }
            return back()->with('old_pwd_error', 'Le mot de passe est incorrect.');
        }
        return view('dashboard.dashboard_password');
    }

    public function myPosts() {
        return view('dashboard.dashboard_posts')->with([
            'posts'=>auth()->user()->posts
        ]);
    }

    public function myActualOrders() {
        return view('dashboard.dashboard_myactualorders');
    }

    public function myOldOrders() {
        return view('dashboard.dashboard_myoldorders');
    }

    //DASHBOARD ADMIN
    public function addProduct() {
        return view('dashboard.admin.dashboard_products_admin');
    }

    public function oldOrders() {
        return view('dashboard.admin.dashboard_oldorders_admin');
    }

    public function newOrders() {
        return view('dashboard.admin.dashboard_neworders_admin');
    }

}
