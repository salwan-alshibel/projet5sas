<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Products_image;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    
    //Products by categories:
    // public function waos() {
    //      return view('products.waos');
    // }

    // public function w40k() {
    //     return view('products.w40k');
    // }

    // public function paints() {
    //     return view('products.paints');
    // }

    public function viewByCategory(Request $request) {
        //$categories = Category::where('online', 1)->get();
        //return view('products.mainShop', compact('categories'));

        $products = Product::where('category_id', $request->id)->get();

        // Method replace by Eloquant Relationship OneToOne:
        // $productsImages = [];
        // //dd($productsImages);
        // foreach ($products as $product) {
        //     array_push($productsImages, Products_image::where('product_id', $product->id)->first());
        // }
        // //dd($productsImages);
        // return view('products.mainShop', [
        //     'products' => $products,
        //     'productsImages' => $productsImages
        // ]);

        return view('products.mainShop', compact('products'));
    }


    //One product page:
    public function product(Request $request) {

        //First method:
        // $product = DB::table('products')->find($request->id);
        // $productImages = DB::table('products_images')->where('product_id', $request->id)->first();

        // return view('products.single_product', [
        //     'product' => $product,
        //     'productImages' => $productImages
        // ]);


        //Second method:
        $product = Product::with('products_image')->find($request->id);

        return view('products.single_product', [
            'product' => $product]);

    } 
}
