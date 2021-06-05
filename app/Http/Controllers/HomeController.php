<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Product;
use App\Models\Products_image;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index(){

        //Take all products with categories and images using eager loading:
        // $products = Product::with(['category', 'products_image'])->get();
        // dd($products);
        // return view('home', ['products' => $products]);


        // $productsForHomePage = Tag::where('name', '#Nouveauté')->with(['products'])->get();
        $allTagsWithProducts = Tag::with(['products'])->get();
        // dd($allTagsWithProducts);
        // foreach ($productsForHomePage as $productForHomePage) {
        //     dd($productForHomePage);
        // }

        return view('home', ['allTagsWithProducts' => $allTagsWithProducts]);
    }
}
