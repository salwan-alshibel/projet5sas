<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Products_image;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Classes\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

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

        //$products = Product::where('category_id', $request->id)->get();
        $category = Category::find($request->id);
        $products = $category->productsViaAll();

        //Take all products with pagination and create a pagination object
        $products = $this->pagination($products, $category);

        //Separate the collection of products and the object pagination
        $pagination = array_pop($products);
        $products = array_pop($products);

        //dd($pagination);


        // Method replaced by Eloquant Relationship OneToOne:
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
        return view('products.mainShop', compact('products', 'category', 'pagination'));

        // return view('products.mainShop', compact('products', 'category'));
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

    //Own pagination: 
    public function pagination($products, $category){
        //Find actual page
        if(isset($_GET['page']) && !empty($_GET['page'])){
            $currentPage = (int) strip_tags($_GET['page']);
        } else {
            $currentPage = 1;
        }

        //Number of products
        $numberOfProducts = count($products);

        //Max products per page
        $perPage = 6;

        //Calcul of total page in result
        $totalPages = ceil($numberOfProducts / $perPage);

        //Create a pagination object with infos needed to create dynamic pagination buttons
        $pagination = new Pagination($currentPage, $totalPages);

        //1st product of each page
        $first = ($currentPage * $perPage) - $perPage;

        $productsWpagination = $category->productsWithPagination($first, $perPage);
        
        return [$productsWpagination, $pagination] ;
    }


    public function search(Request $request): JsonResponse
    {
        $r = $request->input('searchValueForController');

        $searchProducts = Product::where('title', 'like', '%' . $r . '%')->limit(10)->get();

        return response()->json([
            'searchProducts' => $searchProducts
        ]);
    }
}
