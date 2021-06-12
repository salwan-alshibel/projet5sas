@extends('layouts.app')


@section('content')




<div class="darkable flex justify-center bg-gray-300 lg:h-screen">
    <div class="lg:h-screen w-full md:w-11/12">
        <div class="lessDarkable mx-auto mt-20 mb-12 bg-gray-100 shadow-lg rounded-lg md:max-w-5xl">
            <div class="w-full p-2 sm:p-8 flex flex-col">
                
                <h1 class="text-2xl text-center md:text-left font-medium ">Paiement</h1>

                <form action="{{route('checkout.store')}}" method="POST" id="payment-form" class="my-4" data-secret="{{$clientSecret}}">
                    <input type="hidden" name="_token" id="token-input" value="{{ csrf_token() }}" />
                    <div id="card-element">
                      <!-- Elements will create input elements here -->
                    </div>
                  
                    <!-- We'll put the error messages in this element -->
                    <div id="card-errors" role="alert"></div>
                    
                    <button id="card-button" class="p-2 my-4 rounded-lg bg-blue-500">Payer {{Session::get('cart')->totalPrice}} €</button>

                    <div id="error-message-zone" class="hidden p-2 my-4 text-center rounded-lg bg-red-500"><i class="fas fa-exclamation-triangle"></i> </div>

                    <div class="italic text-xs"> PaymentIntent code for testing purpose only : 
                        <ul>
                            <li>PaymentIntent Ok : 4242424242424242</li>
                            <li>Authentication needed: 4000002500003155</li>
                            <li>Insufficient funds : 4000000000009995</li>
                        </ul>
                    </div>
                </form>

                

            </div>
        </div>
    </div>
</div>


<script src="https://js.stripe.com/v3/"></script>

<script>
    var stripe = Stripe(

    'pk_test_51IztmeCx26jqgTC1KyDXKLY5J1p4cT5zTT9oDRSbOwAxL3OO2jAI4bI6t8HqWuIdjxWIPaRw4TGAfymPzeQ49yZ300JA98FQwL'
    );

    var elements = stripe.elements();

    var style = {
        base: {
            color: "#4d8aff",
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: "antialiased",
            fontSize: "16px",
            "::placeholder": {
                color: "#3cca28"
            }
        },
        invalid: {
            color: "#fa755a",
            iconColor: "#fa755a"
        }
    };


    var card = elements.create("card", { style: style });
    card.mount("#card-element");

    card.on('change', ({error}) => {
        let displayError = document.getElementById('card-errors');
        if (error) {
            displayError.textContent = error.message;
        } else {
            displayError.textContent = '';
        }
    });


    var form = document.getElementById('payment-form');
    var cardBtn = document.getElementById('card-button');
    var errorMsgZone = document.getElementById('error-message-zone');

    form.addEventListener('submit', function (ev) {
        ev.preventDefault();
        // If the client secret was rendered server-side as a data-secret attribute
        // on the <form> element, you can retrieve it here by calling `form.dataset.secret`
        cardBtn.disabled = true;

        stripe.confirmCardPayment("{{$clientSecret}}", {
            payment_method: {
                card: card,
                // billing_details: {
                //     name: 'Jenny Rosen'
                // }
            }
        }).then(function (result) {
            if (result.error) {
                // Show error to your customer (e.g., insufficient funds)
                cardBtn.disabled = false;
                errorMsgZone.style.display = 'block';
                errorMsgZone.innerHTML += result.error.message;
                console.log(result.error.message);
            } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                    var paymentIntent = result.paymentIntent;
                    var url = form.action;
                    var redirect = 'paiement-ok';
                    const token = document.getElementById('token-input').value;
                    console.log('payment succeeded');

                    fetch(
                        url,
                        {
                            headers:{
                                'Content-Type': 'application/json',
                                "Accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                'X-CSRF-TOKEN': token
                            },
                            method: 'post',
                            body: JSON.stringify({
                                paymentIntent: paymentIntent
                            })
                        }
                    ).then((data) => {
                        console.log(data);
                        window.location.href = redirect;
                    }).catch(error => {
                        console.log(error);
                    })
                }
            }
        });
    });
</script>
@endsection