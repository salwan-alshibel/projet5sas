<?php

namespace App\Http\Controllers;

use App\Classes\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index() {

        //Envoyer les informations du panier à la page panier:
        
            
        return view('cart.cart');
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
        return back()->with('message', 'Produit ajouté');
    }
}
