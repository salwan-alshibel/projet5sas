<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function product(Request $request) {
        //dd($request);

    
        $product = DB::table('products')->find($request->id);
        $productImages = DB::table('products_images')->where('product_id', $request->id)->first();
        //dd($productImages);

        

        return view('products.single_product', [
            'product' => $product,
            'productImages' => $productImages
        ]);

    }

}
