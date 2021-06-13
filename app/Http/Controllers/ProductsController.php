<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Products_image;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Classes\Pagination;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use PhpParser\Node\Stmt\TryCatch;

class ProductsController extends Controller
{
    public function viewByCategory(Request $request) {

        $category = Category::findOrFail($request->id);
        $products = $category->productsViaAll();

        //Take all products with pagination and create a pagination object
        $products = $this->pagination($products, $category);

        //Separate the collection of products and the object pagination
        $pagination = array_pop($products);
        $products = array_pop($products);

        return view('products.mainShop', compact('products', 'category', 'pagination'));
    }


    //One product page:
    public function product(Request $request) {

        try {
            $product = Product::with(['products_image'])->findOrFail($request->id);
        } catch (\Exception $exception) {
            return view('errors.product_not_found');
        }
        

        $posts = Post::orderBy('created_at', 'asc')->with(['user', 'likes'])->where('product_id', $request->id)->paginate(3);

        return view('products.single_product', [
            'product' => $product, 'posts' => $posts]);

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

    // public function hide(Product $product) {

    //     DB::table('products')->where('id', $product->id)->update(['shop'=> 0]);
        
    //     return back();
    // }


    public function destroy(Product $product) {

        DB::table('products')->where('id', $product->id)->delete();

        return redirect()->route('home');
    }
}
