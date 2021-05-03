<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){

        //$messages = Message::all();

        // return view('home', [
        //     'messages' => $messages
        // ]);

        $products = Product::all();
        //dd($products);
        return view('home', ['products' => $products]);
    }

    public function allProducts() {
        // SELECT * FROM Products
        
        $products = Product::all();
        dd($products);
        return $products
        ;
    }
}
