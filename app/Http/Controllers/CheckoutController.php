<?php

namespace App\Http\Controllers;

use App\Classes\Cart;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
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
        
        $data = $request->json()->all();

        $order = new Order();

        $order->payment_intent_id = $data['paymentIntent']['id'];
        $order->payment_total = $data['paymentIntent']['amount'];
        $order->created_at = (new DateTime())->setTimestamp($data['paymentIntent']['created']);
        $order->updated_at = (new DateTime())->setTimestamp($data['paymentIntent']['created']);
        $order->cart = serialize(Session::get('cart'));

        $order->user_id = Auth()->user()->id;

        $order->save();

        if($data['paymentIntent']['status'] === 'succeeded') {
            Session::forget('cart');
            Session::flash('success', 'Votre commande a été traité avec succès !');
            return response()->json(['success' => 'Payment Intent Succeeded']);
        } else {
            return response()->json(['error' => 'Payment Intent Not Succeeded']);
        }

        //return $data['paymentIntent'];

        
    }




    public function paiement_ok() {

        return Session::has('success') ? view('checkout.paiement_ok') : redirect()->route('cart');
    }

}
