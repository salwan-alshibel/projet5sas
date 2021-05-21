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
        
        //Replaced by OneToOne method:
        //$productsImages = Products_image::all();
        // return view('home', ['products' => $products], ['productsImages' => $productsImages]);

        return view('home', ['products' => $products]);
    }

    // public function allProducts() {
    //     // SELECT * FROM Products
        
    //     $products = Product::all();
    //     dd($products);
    //     return $products
    //     ;
    // }
}
