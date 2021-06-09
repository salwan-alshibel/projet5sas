<?php

namespace App\Http\Controllers;

use App\Classes\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware(['auth']); 
    }

    public function index() {

        $oldCart = Session::has(('cart')) ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        
        if($total > 0) {
            Stripe::setApiKey('sk_test_51IztmeCx26jqgTC1qmzV1JI0jRoI2ftcMTRtf7Qh3LrASi4FE8ZvXdjKok72vlYaIDLSnRrDV5IoGXzjqluUn95C00JWhF7XfA'
            );
            
            $intent = PaymentIntent::create([
            'amount' => $total * 100,
            'currency' => 'eur',
            // Verify your integration in this guide by including this parameter
            'metadata' => ['integration_check' => 'accept_a_payment'],
            ]);
            
            //$clientSecret = Arr::get($intent, 'client_secret');
            $clientSecret = $intent->client_secret;

            //dd($clientSecret);

            return view('checkout.index', ['clientSecret' => $clientSecret]);
        } else {
            return back();
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        Session::forget('cart');
        $data = $request->json()->all();

        return $data['payementIntent'];
    }

    public function paiement_ok() {
        return view('checkout.paiement_ok');
    }

}
