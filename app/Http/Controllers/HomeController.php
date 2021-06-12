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

        //Take all products with a tag:
        $allTagsWithProducts = Tag::with(['products'])->get();
        
        return view('home', ['allTagsWithProducts' => $allTagsWithProducts]);
    }
}
