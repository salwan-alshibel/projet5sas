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
            //dd(Session::get('cart'));
            return view('cart.cart', ['products' => $cart->products, 'totalPrice' => $cart->totalPrice]);
            

        } else {
            return view('cart.cart')->with('emptyCart', 'Votre panier est vide');
        }
    }

    public function addToCart(Request $request) {

        //Récupérer le produit en fonction de son id:
        $product = Product::find($request->id);
        $quantity = $request->quantity;

        //Ajouter le produit à une session Laravel:
            //->Vérification de l'existence d'un panier en cours, si oui on le récupère:
        $oldCart = Session::has(('cart')) ? Session::get('cart') : null;
            //->Instanciation d'un objet Cart:
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $quantity);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));

        //dd($_POST, $product, $request->quantity);
        return back()->with('message', 'Ajouté !');
    }

    public function updateCart(Request $request){
        $oldCart = Session::has(('cart')) ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        //dd($request->id, $request->quantity);
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
