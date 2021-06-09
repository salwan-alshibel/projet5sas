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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
