<?php

namespace App\Http\Controllers;

use App\Classes\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index() {
        
        if (Session::has('cart')) {
            $cart = Session::get('cart');

            return view('cart.cart', ['products' => $cart->products, 'totalPrice' => $cart->totalPrice, 'totalPriceTTC' => $cart->totalPriceTTC]);
            

        } else {
            return view('cart.cart')->with('emptyCart', 'Votre panier est vide');
        }
    }

    public function addToCart(Request $request) {

        $product = Product::with('products_image')->find($request->id);
        $quantity = $request->quantity;

        $oldCart = Session::has(('cart')) ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $quantity);

        $request->session()->put('cart', $cart);

        return back()->with('message', 'Ajouté !');
    }

    public function updateCart(Request $request){
        $oldCart = Session::has(('cart')) ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        
        $cart->updateQty($request->id, $request->quantity);

        if (count($cart->products) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('cart');
    }

    public function removeProductFromCart(Request $request){
        $oldCart = Session::has(('cart')) ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($request->id);

        if (count($cart->products) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        
        return redirect()->route('cart');
    }

}
