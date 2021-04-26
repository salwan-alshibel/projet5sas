<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function info_safe_payment() {
        return view('site_info.safety_payment');
   }

   public function info_sales_conditions() {
       return view('site_info.sales_conditions');
   }
}
