@extends('layouts.app')


@section('content')
<div class="darkable flex justify-center bg-dusty-gray-100">

    <div class="lessDarkable lg:m-16 rounded-xl">

        <div class="flex flex-col lg:flex-row">
            <!-- product images -->
            <div class="bg-white rounded-lg">
                <img class="w-9/12 m-auto"
                    src="{{ asset('images/products_images/'. $product->products_image->first_img) }}"
                    alt={{ $product->products_image->first_img }}>
            </div>

            <!-- Category, Title, Summary and Price -->
            <div class="flex flex-col p-8 lg:w-96">
                <!-- category name -->
                <div class="w-max px-2 py-1 uppercase tracking-wide text-xs font-semibold text-indigo-100 bg-indigo-700 rounded">
                    {{ $product->category->name }}
                </div>

                <!-- product title -->
                <div class=" block mt-1 py-4 text-2xl leading-tight font-bold">
                    {{$product->title}}
                </div>

                <!-- product summary -->
                <div class="pb-11">
                    <p>{{ $product->summary }}</p>
                </div>


                <!-- product price and addToCart button -->
                <div>
                    <p class="pb-3 text-3xl">{{ $product->prixTTC() }} € </p>

                    <form id="formCart"  class="pb-5" action="{{route('addToCart', ['id'=>$product->id])}}" method="POST">
                        @csrf
                        <label for="quantity">Quantité : </label>
                        <select id="quantity" class="text-black text-xl text-center" name="quantity">
                            @for ($i = 1; $i < 11; $i++) <option value="{{$i}}">{{$i}}</option>
                                @endfor
                        </select>
                    </form>

                    <div class="flex flex-row">
                        <button type="submit" form="formCart"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Ajouter au panier
                        </button>

                        @if (session('message'))
                            <div class="bg-green-400 font-bold rounded ml-2 py-2 px-4 text-white text-center w-max">
                                <i class="text-xl fas fa-check"></i> {{ session('message') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- separation lign -->
        <div class="pt-8">
            <span class="block border-b border-gray-300 m-auto w-3/4"></span>
        </div>
        <!-- product content -->
        <div class="p-8">
            <p class="text-xl">Description :</p>
            <p class="mt-2  overflow-hidden">{{ $product->content }}</p>
        </div>
    </div>

    {{-- <div class="w-8/12 bg-custom-dark text-white p-6 rounded-lg">

        @if ($product->id) --}}


    {{-- <a href="{{ route('product', [$product->id, $product->slug]) }}">
    <div class="max-w-md h-72 mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl hover:underline">
        <div class="md:flex">
            <div class="md:flex-shrink-0">
                <img class="h-72 w-full md:w-48 object-contain"
                    src="{{ asset('images/products_images/'. $productImages->{'1st_img'}) }}" alt="product image">
            </div>
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-black font-semibold"> Catégorie du produit ... à
                    définir </div>
                <div class="block mt-1 text-lg leading-tight font-medium text-black">{{$product->title}}</div>
                <div class="text-gray-500 ">
                    <p class="mt-2 max-h-36 text-gray-500 overflow-hidden">{{ $product->content }}</p>
                    <p> [...] </p>
                </div>
            </div>
        </div>
    </div>
    </a> --}}

    {{-- <div class="flex justify-center">
            <div class="w-8/12 bg-white p-6 rounded-lg">
                <x-product :product="$product" :productImages="$productImages" />
            </div>
        </div>

        @else
        <p>On a un problème... Produit introuvable !</p>
        <a href="{{ route('home') }}"> Retour à l'accueil </a>
    @endif
</div> --}}
</div>
@endsection


