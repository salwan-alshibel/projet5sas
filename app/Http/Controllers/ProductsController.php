<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function waos() {
         return view('products.waos');
    }

    public function w40k() {
        return view('products.w40k');
    }

    public function paints() {
        return view('products.paints');
    }
}
