<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Product;
use App\Models\Products_image;


class HomeController extends Controller
{
    public function index(){

        //Take all products with categories and images using eager loading:
        $products = Product::with(['category', 'products_image'])->get();
        //dd($products->first->category);
        
        // foreach($products as $product) {
        //     ; var_dump($product); echo
        // };

        
        //Replaced by OneToOne method:
        //$productsImages = Products_image::all();
        // return view('home', ['products' => $products], ['productsImages' => $productsImages]);

        return view('home', ['products' => $products]);
    }
}
