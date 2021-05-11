<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function __construct() {
       $this->middleware(['auth']); 
    }
    
    public function index() {
        //dd(auth()->user()->posts);
        return view('dashboard.homeDashboard');
    }

    public function updateProfile() {
        //dd(auth()->user()->posts);
        return view('dashboard.updateProfile');
    }
}
