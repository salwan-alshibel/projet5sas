@extends('layouts.app')


@section('content')
<div class="darkable flex justify-center bg-gray-300 lg:h-screen">
    <div class="lg:h-screen w-full md:w-11/12">
        <div class="lessDarkable mx-auto mt-20 mb-12 bg-gray-100 shadow-lg rounded-lg md:max-w-5xl">
            <div class="w-full p-2 sm:p-8 flex flex-col">
                
                <h1 class="text-2xl text-center md:text-left font-medium ">Panier</h1>

                @if(Session::has('cart'))
                    @foreach ($products as $product)
                        <div class="flex flex-col md:flex-row justify-between items-center mt-6 pt-6 pb-4 border-b">
                            <!-- Image -->
                            <a href="{{ route('product', [$product['product']['id'], $product['product']['slug']]) }}">
                                <figure>
                                    <img class="w-80 md:w-40 m-auto" src="{{ asset('images/products_images/'. $product['product']['products_image']['first_img']) }}"
                                    alt={{ $product['product']['products_image']['first_img'] }}>
                                </figure>
                            </a>
                                <!-- Title -->
                                <a href="{{ route('product', [$product['product']['id'], $product['product']['slug']]) }}">
                                <div class="p-8 pl-0 md:p-8 w-full  md:w-52 text-3xl md:text-base hover:underline">
                                    {{ $product['product']['title']}}
                                </div>
                                </a>


                                <div class="flex flex-col lg:flex-row w-full md:w-80 text-center items-start">

                                <!-- Price -->
                                <div class="md:w-32 md:px-4 mb-5 md:mb-0">
                                    Prix TTC/U : 
                                    <span class="text-xl">{{ $product['priceWithTax'] }}€</span>
                                </div>


                                <!-- Change quantity -->
                                <div class="flex flex-row mb-5 md:mb-0">
                                    <form id="{{$product['product']['id']}}" class="w-32 self-center"
                                        action="{{route('cart.update', ['id'=>$product['product']['id']])}}" method="POST">
                                        @csrf
                                        <label for="quantity">Quantité : </label>
                                        <select id="quantity" class="text-black text-lg text-center rounded" name="quantity" onchange="this.form.submit()">
                                            @for ($i = 1; $i < 11; $i++)
                                                @if ($i==$product['qty'])
                                                    <option value="{{$i}}" selected>{{$i}}</option>
                                                @elseif ($i <= $product['product']['quantity'] )
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    </form>
                                
                                    <!-- Refresh button -->
                                    <div class="transform scale-75 text-center self-center">
                                        <button type="submit" title='Mettre à jour' form="{{$product['product']['id']}}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <div class="flex flex-row w-full md:w-80 text-center items-center justify-end">
                                <!-- Sub total -->
                                <div class="w-40 md:px-6 text-right">
                                    Sous total : 
                                    <span class="text-xl">{{$product['subtotalTTC']}}€</span>
                                </div>

                                <!-- Remove product button -->
                                <form id="remove_{{$product['product']['id']}}" class="pb-5" action="{{route('cart.remove', ['id'=>$product['product']['id']])}}" method="POST">
                                    @csrf
                                </form>

                                <div class="flex flex-row pl-4">
                                    <button type="submit" title='Retirer du panier' form="remove_{{$product['product']['id']}}"
                                        class="bg-red-500 hover:bg-red-900 text-white font-bold py-2 px-4 rounded">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                <div class="flex flex-col">
                    <div class="flex justify-end items-center mt-6 py-6">
                        <span class="text-lg font-medium mr-1">
                            TOTAL TTC :
                        </span>
                        <span class="text-xl font-bold">
                            {{$totalPriceTTC}} €
                        </span>
                    </div>

                    <a href="{{Route('checkout.index')}}" class="flex justify-center items-center h-12 w-52 m-auto font-bold bg-blue-500 rounded focus:outline-none text-white hover:bg-blue-600">
                        Etape suivante
                    </a>
                </div>

                @else
                <div class="text-center p-4 sm:p-16 text-2xl">Votre panier est vide.</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
