<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {

        //Envoyer les informations du panier à la page panier:
        


        return view('checkout.cart');
    }

    public function addToCart(Request $request) {

        //Récupérer le produit en fonction de son id:
        $product = Product::find($request->id);
        $quantity = $request->quantity;

        //Ajouter le produit à la table cart:


        //dd($_POST, $product, $request->quantity);
        return back()->with('message', 'Produit ajouté');
        //return Redirect::back()->with('message','Operation Successful !');
        //return view('checkout.cart');
    }
}
