@extends('layouts.app')


@section('content')
<div class="flex justify-center">

    <div class="m-16 flex flex-row items-center justify-evenly">
        <div class="bg-white rounded-lg">
            {{-- <img class="h-72 w-full md:w-48 object-contain" src="{{ asset('images/products_images/'. $productImages->first_img) }}" alt="product image"> --}}
            <img class="h-72 w-full md:w-48 object-contain" src="{{ asset('images/products_images/'. $product->products_image->first_img) }}" alt={{ $product->products_image->first_img }}>
        </div>
        <div class="p-8 w-1/2">
            <div class="inline-flex items-center justify-center px-2 py-1 uppercase tracking-wide text-xs font-semibold text-indigo-100 bg-indigo-700 rounded">{{ $product->category->name }}</div>
            <div class="block mt-1 text-lg leading-tight font-medium text-black">{{$product->title}}</div>
            <div class="text-gray-500 ">
                <p class="mt-2 text-gray-500 overflow-hidden">{{ $product->content }}</p>
                <p>{{ $product->summary }}</p>
            </div>
        </div>
        <div> 
            <p>{{ $product->price }} € </p>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Ajouter au panier
              </button>
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
