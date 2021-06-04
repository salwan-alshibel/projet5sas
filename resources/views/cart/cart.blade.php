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
                                    <span class="text-xl">{{ $product['product']['price'] }}€</span>
                                </div>


                                <!-- Change quantity -->
                                <div class="flex flex-row mb-5 md:mb-0">
                                    <form id="{{$product['product']['id']}}" class="w-32 self-center"
                                        action="{{route('cart.update', ['id'=>$product['product']['id']])}}" method="POST">
                                        @csrf
                                        <label for="quantity">Quantité : </label>
                                        <select id="quantity" class="text-black text-lg text-center rounded" name="quantity">
                                            @for ($i = 1; $i < 11; $i++) @if ($i==$product['qty']) <option value="{{$i}}" selected>
                                                {{$i}}
                                                </option>
                                                @else
                                                <option value="{{$i}}">
                                                    {{$i}}
                                                </option>
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
                                    <span class="text-xl">{{$product['priceXqty']}}€</span>
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
                            TOTAL :
                        </span>
                        <span class="text-xl font-bold">
                            {{$totalPrice}} €
                        </span>
                    </div>

                    <button class="h-12 w-52 m-auto bg-blue-500 rounded focus:outline-none text-white hover:bg-blue-600">
                        Etape suivante
                    </button>
                </div>

                @else
                <div class="text-center p-4 sm:p-16 text-2xl">Votre panier est vide.</div>
                @endif
            </div>
        </div>
    </div>
</div>

































{{-- <div class="darkable flex justify-center bg-gray-300">
    <div class="h-screen">
        <div class="lessDarkable max-w-md mx-auto mt-12 bg-gray-100 shadow-lg rounded-lg md:max-w-5xl">
            <div class="md:flex ">
                <div class="w-full p-4 px-5 py-5">
                    <div class="md:grid md:grid-cols-3 gap-2 ">
                        <div class="col-span-3 p-5">
                            @if(Session::has('cart'))

                            <h1 class="text-xl font-medium ">Panier</h1>

                            @foreach ($products as $product)
                            <div class="flex justify-between items-center mt-6 pt-6">
                                <div class="flex items-center">
                                    <img src="" width="60" class="rounded-full ">
                                    <div class="flex flex-col ml-3 w-80"> <span class="md:text-md font-medium">
                                            {{ $product['product']['title']}}
                                        </span>
                                        <span class="text-xs font-light text-gray-400">
                                            {{$product['priceXqty']}}€
                                        </span>
                                    </div>
                                </div>


                            <form id="{{$product['product']['id']}}" class="pb-5"
                                action="{{route('cart.update', ['id'=>$product['product']['id']])}}" method="POST">
                                @csrf
                                <label for="quantity">Quantité : </label>
                                <select id="quantity" class="text-black text-xl text-center" name="quantity">
                                    @for ($i = 1; $i < 11; $i++) @if ($i==$product['qty']) <option value="{{$i}}"
                                        selected>
                                        {{$i}}
                                        </option>
                                        @else
                                        <option value="{{$i}}">
                                            {{$i}}
                                        </option>
                                        @endif
                                        @endfor
                                </select>
                            </form>

                            <div class="flex flex-row">
                                <button type="submit" form="{{$product['product']['id']}}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </div>

                            <!-- Remove product button -->
                            <form id="remove_{{$product['product']['id']}}" class="pb-5"
                                action="{{route('cart.remove', ['id'=>$product['product']['id']])}}" method="POST">
                                @csrf
                            </form>

                            <div class="flex flex-row">
                                <button type="submit" form="remove_{{$product['product']['id']}}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>






                            <div class="flex justify-center items-center">
                                <div class="pr-8 ">
                                    <span class="text-xs font-medium">{{ $product['product']['price'] }}
                                    </span>
                                </div>
                                <div>
                                    <i class="fa fa-close text-xs font-medium"></i>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="flex justify-between items-center mt-6 pt-6 border-t">
                            <div class="flex justify-center items-end">
                                <span class="text-sm font-medium text-gray-400 mr-1">
                                    Sous total:
                                </span>
                                <span class="text-lg font-bold">
                                    {{$totalPrice}} €
                                </span>
                            </div>
                        </div>
                        <button class="h-12 w-full bg-blue-500 rounded focus:outline-none text-white hover:bg-blue-600">
                            Etape suivante
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div> --}}














{{-- <div class="flex justify-center">
    <div class="h-screen bg-gray-300">
        @if(Session::has('cart'))
        <div class="py-12">
            <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg md:max-w-5xl">
                <div class="md:flex ">
                    <div class="w-full p-4 px-5 py-5">
                        <div class="md:grid md:grid-cols-3 gap-2 ">
                            <div class="col-span-2 p-5">
                                <h1 class="text-xl font-medium ">Panier</h1>
                                @foreach ($products as $product)
                                    <div class="flex justify-between items-center mt-6 pt-6">
                                        <div class="flex items-center"> <img src="" width="60" class="rounded-full ">
                                            <div class="flex flex-col ml-3"> <span class="md:text-md font-medium">{{ $product['product']['title']}}</span>
<span class="text-xs font-light text-gray-400">#41551</span> </div>
</div>

<label for="quantity">Quantité : </label>
<select id="quantity" name="quantity">
    @for ($i = 1; $i < 11; $i++) @if ($i==$product['qty']) <option value="{{$i}}" selected>{{$i}}</option>
        @else <option value="{{$i}}">{{$i}}</option>
        @endif
        @endfor
</select>
<div class="flex justify-center items-center">
    <div class="pr-8 "> <span class="text-xs font-medium">$10.50</span> </div>
    <div> <i class="fa fa-close text-xs font-medium"></i> </div>
</div>
</div>
@endforeach
<div class="flex justify-between items-center mt-6 pt-6 border-t">
    <div class="flex items-center"> <i class="fa fa-arrow-left text-sm pr-2"></i> <span
            class="text-md font-medium text-blue-500">Continue Shopping</span> </div>
    <div class="flex justify-center items-end"> <span class="text-sm font-medium text-gray-400 mr-1">Subtotal:</span>
        <span class="text-lg font-bold text-gray-800 "> $24.90</span> </div>
</div>
</div>
<div class=" p-5 bg-gray-800 rounded overflow-visible"> <span class="text-xl font-medium text-gray-100 block pb-3">Card
        Details</span> <span class="text-xs text-gray-400 ">Card Type</span>
    <div class="overflow-visible flex justify-between items-center mt-2">
        <div class="rounded w-52 h-28 bg-gray-500 py-2 px-4 relative right-10"> <span
                class="italic text-lg font-medium text-gray-200 underline">VISA</span>
            <div class="flex justify-between items-center pt-4 "> <span
                    class="text-xs text-gray-200 font-medium">****</span> <span
                    class="text-xs text-gray-200 font-medium">****</span> <span
                    class="text-xs text-gray-200 font-medium">****</span> <span
                    class="text-xs text-gray-200 font-medium">****</span> </div>
            <div class="flex justify-between items-center mt-3"> <span class="text-xs text-gray-200">Giga
                    Tamarashvili</span> <span class="text-xs text-gray-200">12/18</span> </div>
        </div>
        <div class="flex justify-center items-center flex-col"> <img
                src="https://img.icons8.com/color/96/000000/mastercard-logo.png" width="40" class="relative right-5" />
            <span class="text-xs font-medium text-gray-200 bottom-2 relative right-5">mastercard.</span> </div>
    </div>
    <div class="flex justify-center flex-col pt-3"> <label class="text-xs text-gray-400 ">Name on Card</label> <input
            type="text"
            class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4"
            placeholder="Giga Tamarashvili"> </div>
    <div class="flex justify-center flex-col pt-3"> <label class="text-xs text-gray-400 ">Card Number</label> <input
            type="text"
            class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4"
            placeholder="**** **** **** ****"> </div>
    <div class="grid grid-cols-3 gap-2 pt-2 mb-3">
        <div class="col-span-2 "> <label class="text-xs text-gray-400">Expiration Date</label>
            <div class="grid grid-cols-2 gap-2"> <input type="text"
                    class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4"
                    placeholder="mm"> <input type="text"
                    class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4"
                    placeholder="yyyy"> </div>
        </div>
        <div class=""> <label class="text-xs text-gray-400">CVV</label> <input type="text"
                class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4"
                placeholder="XXX"> </div>
    </div> <button class="h-12 w-full bg-blue-500 rounded focus:outline-none text-white hover:bg-blue-600">Check
        Out</button>
</div>
</div>
</div>
</div>
</div>
</div>
@endif
</div>
</div> --}}
@endsection
