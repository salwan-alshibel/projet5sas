@extends('dashboard.dashboard_template')

@section('dashboard-content')

<div class="darkable min-h-screen bg-dusty-gray-200 p-0 md:p-12">
    <div class="lessDarkable bg-white rounded-lg  ">
        <h1 class="p-8 text-2xl font-bold">Commandes déja envoyées :</h1>
        <div class="border-b border-gray-500 m-auto md:m-0 w-5/6"></div>
        <div class="p-0 mt-1 md:p-8">
            
            @if (session('message'))
            <div class="bg-green-500 p-4 rounded-lg mb-6 text-center">
                <i class="fas fa-check"></i>  Commande n°{{ session('message') }} déplacée vers les commandes envoyées.
            </div>
            @endif

            @foreach ($orders as $order)
                <div class="darkable border-white rounded-lg shadow-lg flex flex-col p-5 mb-4 bg-outer-space-200">
                    <h2 class="text-lg">Commande du {{($order->created_at)->format('d/m/Y')}}</h2>
                    <h3 class="text-sm italic pt-1 pb-6">N° de commande : {{$order->id}}</h3>
                    <div class="text-black border-white border-solid border-t rounded-lg shadow-lg flex flex-col p-5 mb-4 bg-white">
                        <p class="underline pb-1">Client :</p>
                        <p>{{$order->user->name}}</p>
                        <p>{{$order->user->email}}</p>
                    </div>
                    @foreach ($order->cart->products as $product)
                    <div class="text-black border-white border-solid border-t rounded-lg shadow-lg flex flex-col p-5 mb-4 bg-white">
                            <p class="underline pb-1">Produits :</p>
                            <p>{{$product['qty'] }} x {{$product['product']['title']}} </p>
                            <p>{{$product['priceWithTax']}} € / Unité</p>
                            <p>Sous total = {{$product['subtotalTTC']}} €</p>
                        </div>
                    @endforeach
                    <div class="text-right text-xl">
                        Total : {{$order->cart->totalPrice}} €
                        <p class="inline bg-green-400 p-1 rounded-lg text-sm"><i class="fas fa-check"></i> Paiement validé</p>
                    </div>
                    <div class="flex justify-center">
                        <div class="px-2 py-1 text-lg text-white rounded-lg bg-green-600">
                            Commande envoyée
                        </div>
                    </div>
                </div>
                
                @endforeach
                 {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection