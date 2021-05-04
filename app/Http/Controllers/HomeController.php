<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Product;
use App\Models\Products_image;


class HomeController extends Controller
{
    public function index(){

        //$messages = Message::all();

        // return view('home', [
        //     'messages' => $messages
        // ]);

        $products = Product::all();
        //dd($products);
        $productsImages = Products_image::all();
        //dd($productsImages);
        return view('home', ['products' => $products], ['productsImages' => $productsImages]);
    }

    // public function allProducts() {
    //     // SELECT * FROM Products
        
    //     $products = Product::all();
    //     dd($products);
    //     return $products
    //     ;
    // }
}
