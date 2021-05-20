<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    
    //Products by categories:
    public function waos() {
         return view('products.waos');
    }

    public function w40k() {
        return view('products.w40k');
    }

    public function paints() {
        return view('products.paints');
    }

    public function viewByCategory() {
        //$categories = Category::where('online', 1)->get();

        //return view('products.mainShop', compact('categories'));
        return view('products.mainShop');
    }


    //One product page:
    public function product(Request $request) {

        $product = DB::table('products')->find($request->id);
        $productImages = DB::table('products_images')->where('product_id', $request->id)->first();

        return view('products.single_product', [
            'product' => $product,
            'productImages' => $productImages
        ]);
    } 
}
