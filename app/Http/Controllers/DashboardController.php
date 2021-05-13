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
        return view('dashboard.dashboard_home');
    }

    public function updateProfile() {
        return view('dashboard.dashboard_profile');
    }

    public function updatePassword() {
        return view('dashboard.dashboard_password');
    }

    public function myPosts() {
        return view('dashboard.dashboard_posts');
    }

    public function addProduct() {
        return view('dashboard.admin.dashboard_products_admin');
    }

}
